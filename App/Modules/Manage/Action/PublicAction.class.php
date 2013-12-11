<?php
class PublicAction extends Action {
	/**
	 * 后台登录首页
	 */
	public function Index()
	{
		$this->display();
	}
	/**
	 * 用户名检测方法(ajax方法)
	 */
	public function checkuser(){
		if(!I('uid')) exit();

	}
	public function login()
	{
		dump($_POST);
	}
    public function vcode()
    {
    	importP('Verify');
    	Verify::buildImageVerify();
    }
}