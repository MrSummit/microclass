<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>后台管理中心--__NAME__</title>
	<!-- 让ie浏览器使用最新的渲染引擎 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/dark_ui/uilib.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/backyard/style.css" />
	<style>
	.center{
		margin-left: auto;
		margin-right: auto;
		/*width:600px;*/
	}
	</style>
</head>
<body>
	<div class="header">
		<div class="header-logo"><img src="img/logo.png" id="logo" /></div>
	</div>
	<div class="navbar">
        <div class="navbar-inner">
            <ul class="nav pull-right"></ul>
            <a class="Logo" href="#"><span>计信院Logo</span></a>
        </div>
    </div>
    <div class="container" >
		<div class="col-md-4"></div>
		<div id="login-container" class="col-md-6">
			<div id="login-header"><h2 id="logo-title">网站后台</h2></div>
			<div id="login-form">
				<form class="form-signin" action="<?php echo U('Public/login');?>" method="post">
				<p>
					<label for="login-name" id="login-label">用户名</label>
					<input type="text" name="username" class="form-control" id="login-name" placeholder="请输入用户名" autofocus/>
				</p>
				<p>
					<label for="login-password" id="login-label">密&nbsp;&nbsp;&nbsp码</label>
					<input type="password" name="password" class="form-control" id="login-password" placeholder="请输入密码"  />
				</p>
				<p>
					<label id="login-label">验证码</label>
					<input type="text" name="vcode" class="form-control" id="login-password"/>
					<img src="<?php echo U('Public/vcode');?>" alt="验证码" onclick=this.src="<?php echo U('Public/vcode');?>?"+Math.random() />
				</p>
				<div class="clear"></div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
			</div>
		</div>
	</div>
			
</body>
<script type="text/javascript" src="__PUBLIC__/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
<script>
	// $('#login-name').
</script>
</html>