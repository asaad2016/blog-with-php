<?php

$db= array('hostname' => "localhost",
	"dbname"=>"new_blog",
	"dbuser"=>"root",
	"dbpasword"=>""


 );
$dbconnect=mysql_connect($db['hostname'],$db['dbuser'],$db['dbpasword']) or die(mysql_error());
$select=mysql_select_db($db['dbname']) 	or die(mysql_error());



$querys=mysql_query("select * from config");
$fetchobjs=mysql_fetch_object($querys);
define("u_name_s",$fetchobjs->name);
define("u_url",$fetchobjs->url);
define("u_email_s",$fetchobjs->email);
define("u_desc",$fetchobjs->f_desc);
define("u_key",$fetchobjs->f_key);
define("u_close",$fetchobjs->close);
define("u_close_txt",$fetchobjs->close_txt);
define("u_copy",$fetchobjs->f_copty);