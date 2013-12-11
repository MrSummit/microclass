<?php
return array(
	//应用分组设置
	'APP_GROUP_LIST'	=> 'Index,Manage',
	'DEFAULT_GROUP'		=> 'Manage',
	'APP_GROUP_MODE'	=> 1,  //采用独立分组方案
	'APP_GROUP_PATH'	=> 'Modules',

	//数据库设置
	"DB_TYPE" 			=> "mysql",
    "DB_HOST" 			=> "127.0.0.1",
    "DB_NAME" 			=> "jxinfo",
    "DB_USER" 			=> "root",
    "DB_PWD" 			=> "",
    "DB_PORT"			=> "3306",
    "DB_PREFIX" 		=> "jx_",

    'SESSION_TYPE'		=> 'Db',
	//模板设置
	'TMPL_PARSE_STRING'	=> array(
		'__PUBLIC__'	=> __ROOT__ . '/Public',
		'__NAME__'		=> '计信院信息网',
		'__NAME-EN__'	=> 'jx-info',
		),    


	//显示页面trace信息
	'SHOW_PAGE_TRACE'	=> TRUE,
);
?>