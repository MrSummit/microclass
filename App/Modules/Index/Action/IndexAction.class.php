<?php
class IndexAction extends Action {
    public function index()
    {
    	session('hello',1234);
    	echo time()-1379504088;
		$this->display();
    }
}