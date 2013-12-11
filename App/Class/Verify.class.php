<?php
class Verify {
    /**
     * 验证码生成函数
     * @param  integer $length     [验证码长度]
     * @param  integer $mode       [字符模式]
     * @param  string  $type       [description]
     * @param  integer $width      [description]
     * @param  integer $height     [description]
     * @param  string  $size       [description]
     * @param  string  $verifyName [description]
     * @return [type]              [description]
     */
    static function buildImageVerify($length=4, $mode=3, $type='png', $width=120, $height=60, $size='25',$verifyName='verify') {
        $fontpath=  dirname(__PATH__).'/Public/font/ALGER.ttf';
        import('ORG.Util.String');
        $randval = String::randString($length, $mode);
        session($verifyName, md5(strtolower($randval)));
        $width = ($length * 10 + 10) > $width ? $length * 10 + 10 : $width;
        if ($type != 'gif' && function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor($width, $height);
        } else {
            $im = imagecreate($width, $height);
        }
        $r = Array(242, 252, 218, 255);
        $g = Array(242, 255, 255, 255);
        $b = Array(242, 179, 213, 255);
        $key = mt_rand(0, 3);

        $backColor = imagecolorallocate($im, $r[$key], $g[$key], $b[$key]);    //背景色（随机）
        $borderColor = imagecolorallocate($im, 100, 100, 100);                    //边框色

        imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
        imagerectangle($im, 0, 0, $width - 1, $height - 1, $borderColor);
        $stringColor = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
        // 干扰
        for ($i = 0; $i < 10; $i++) {
            imagearc($im, mt_rand(-10, $width), mt_rand(-10, $height), mt_rand(30, 300), mt_rand(20, 200), 55, 44, $stringColor);
        }
        for ($i = 0; $i < 25; $i++) {
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $stringColor);
        }

        $whites = ImageColorAllocate($im, mt_rand(0, 255),mt_rand(0, 255),mt_rand(0, 255));

        $y = $height - ($height - $size) / 2;
        if(file_exists($fontpath)){
            for ($i = 0; $i < $length; $i++) {
                $x = $size * $i + $left+10;
                imagettftext($im, $size, mt_rand(10, 10), $x, $y, $whites, $fontpath, $randval{$i});
            }
        }else{
            for ($i = 0; $i < $length; $i++) {
                imagestring($im, 5, $i * 10 + 5, mt_rand(1, 8), $randval{$i}, $red);
            }
        }
        Verify::output($im, $type);
    }
    static function output($im, $type='png', $filename='') {
        header("Content-type: image/" . $type);
        $ImageFun = 'image' . $type;
        if (empty($filename)) {
            $ImageFun($im);
        } else {
            $ImageFun($im, $filename);
        }
        imagedestroy($im);
    }
}

?>