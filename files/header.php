
<?php
ob_start();

 include "include/config.php"; ?>
<?php include "functions.php";

if(isset($_COOKIE['uid']) and isset($_COOKIE['login'])){
	define("uid", $_COOKIE['uid']);
	define("login", $_COOKIE['login']);
	$selectui=mysql_query("select * from users where userid=".uid."");
	$fetchobj=mysql_fetch_object($selectui);
	define("u_id", $fetchobj->userid);
	define("u_name", $fetchobj->username);
	define("u_lvl", $fetchobj->u_level);
	if(isset($_GET['type'])){
		define("type", $_GET['type']);
	}
	define("email", $fetchobj->email);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo u_name_s; ?></title>
	<meta content="<?php echo u_desc; ?>" name="description">
	<meta content="<?php echo u_key; ?>" name="keywords">
	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    
    
    <link rel="stylesheet"	 href="css/asaad1.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body  style="background-color: #eee">
<?php

?>
	<!---header-->
	<div class="blogwebsite">
		<div class="header">
			<div class="navtop container">
				<ul>
					<?php
						$query_cat=mysql_query("select * from category");
						while($query_cat_fetch=mysql_fetch_object($query_cat)){
					
							echo "<li><a href='cat.php?id=$query_cat_fetch->id''>" . $query_cat_fetch->name . "</a></li>";
						}

					?>
					
				</ul>
				
			</div>
			<div class="clear"></div>
		
			<div class="head container">
				<div class="logo">
					<a href="#"><img src="images/logo.jpg" width="120" height="120"></a>
					
				</div>
				<div class="ads">
					<?php
						$queryadd=mysql_query("select * from ads");
						$queryfetch=mysql_fetch_object($queryadd);
						if($queryfetch->active1==1){
							echo $queryfetch->code1;
						}
					?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="navabr container">
				<ul>
					<li><a href="#">من نحن</a></li>
					<li><a href='contactus.php'>اتصل بنا</a></li>

					<?php 
			    	 if(isset($_COOKIE['uid']) and isset($_COOKIE['login'])){
			    	 	$id=$_COOKIE['uid'];
			    	 	$login=$_COOKIE['login'];
			    	 	}else{
			    	 		$login=0;
			    	 		$id=0;
			    	 	}	
			    	 	
						if ($login==1)
						{
							echo "<li><a href='logout.php'>خروج</a></li>";
							?>
							<li><a href="profile.php?id=<?php echo $id; ?>">بروفايلي</a></li>
							<?php
							if(u_lvl==3){
								echo "<li><a href='admincb.php'>الاداره</a></li>";
							}
						}
						else
						{
						echo "<li><a href='register.php'>تسجيل عضوية جديدة</a></li>";
						}
					
					?>
				
				
					<li><a href="index.php">الرئسية</a></li>
				
			</ul>
			</div>

			
		</div>
		<div class="content">
			<div class="container">
				<div style="float: right;width: 73%;margin-left: 1%;background-color: #ddd;" class="waset">
			