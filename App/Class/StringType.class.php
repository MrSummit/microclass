<?php
class StringType{
	protected $_rules=array(
		'qq'		=>	'[1-9]*[1-9][0-9]*',		//qq号码
		'number'	=>	'-?[1-9]\d*',				//整数
		'zero'		=>	'-?0*',					//0
		'real'		=>	'(-?\d+)(\.\d+)?',		//实数
		'ci_en'		=>	'[A-Za-z]+',				//英文字母字符串
		'uc_en'		=>	'[A-Z]+',					//大写字母字符串
		'lc_en'		=>	'[a-z]+',					//小写字母字符串
		'char'		=>	'[A-Za-z0-9]+',			//数字和26个英文字母
		'char_'		=>	'\w+',					//数字、26个英文字母或者下划线
		'email'		=>	'[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+',	//电子邮件地址
		'ip'		=>	
			'((25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(25[0-5]|2[0-4]\d|[01]?\d\d?)',
			//ip地址
		'date'		=>	'(\d{2}|\d{4})-(([1-9]{1})|(0([1-9]{1}))|(1[0|1|2]))-(([1-9]{1})|([0-2]([0-9]{1}))|(3[0|1]))',
			//日期匹配，年份为12或2012，月份为单位数字或者加0的数字，如9,09,12等，日期为00-31
		'url'		=>	'(([a-zA-Z0-9\._-]+\.[a-zA-Z]{2,6})|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,4})*(/[a-zA-Z0-9\&%_\./-~-]*)?',
			//匹配URL或者IP地址（如：www.baidu.com 或者 192.168.1.1）
			//能匹配到URL的末尾，即能匹配到子URL；（如能匹配：www.baidu.com/s?wd=a&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg&inputT=1236）
			//能够匹配端口号；
		'cnchar'	=>	'[\u4e00-\u9fa5]+',
		'phone'		=>	'((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?([0-9]{7,8})(\-[0-9]+)?',
		'html'		=>	'<(.*)>.*<\/\1>|<(.*) \/>',

		);
	public $custom_rule=array();
	public $ignored_rule=array();

	function __construct($custom_rule=array(),$ignored_rule=array()){
		$this->custom_rule=array_merge($this->custom_rule,$custom_rule);
		$this->ignored_rule=array_merge($this->ignored_rule,$ignored_rule);
	}

	public function check($string,$rule,$complete=1){
		if(!$string || !$rule) return -1;

		//若在忽略列表里则直接返回
		if(in_array($rule, $this->ignored_rule)) return 0;

		//优先使用自定义规则
		if(isset($this->custom_rule[$rule])){
			$regString=$this->custom_rule[$rule];
		}else if(isset($this->_rules[$rule])){
			$regString=$this->_rules[$rule];
		}else{
			return -1;
		}

		//如果$complete=1则全部匹配
		if($complete)
			$regString='/^' . $regString . '$/';
		else
			$regString='/' . $regString . '/';
		// echo $regString;
		return preg_match($regString,$string);
	}
	public function findType($string,$complete=1){
		$result=array();
		$merged_rule=array_merge($this->_rules,$this->custom_rule);
		foreach($merged_rule as $k => $v){
			if(in_array($k, $this->ignored_rule)) continue;
			if($complete)
				$v='/^' . $v . '$/';
			else
				$v='/' . $v . '/';
			if(preg_match($v,$string)){
				$result[]=$k;
			}
		}
		return $result;
	}
	public function addRule($rule_key,$rule_string){
		$this->custom_rule[$rule_key]=$rule_string;
	}
	public function addIgnore($rule_key){
		$this->ignored_rule[]=$rule_key;
	}
}