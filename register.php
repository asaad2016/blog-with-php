<?php include_once "files\header.php"; 
echo "<div class='container' style='width:60%;margin:0 !important; position: absolute;
	top: 260px;
	right: 10px;
	font-size:18px;'>";
	
	
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
		
			
		$errorlist=array();	

		$name=strip_tags($_POST['name']);
		$email=strip_tags($_POST['email']);
		$full=strip_tags($_POST['fullname']);

		$pass=strip_tags($_POST['pass']);
		$avatartmp=$_FILES['profile']['tmp_name'];
		$avatarname=$_FILES['profile']['name'];
		$avtarupload=rand(0,1000000) . "_" . $avatarname;
		

		if(empty($name)){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your name</div>";
		}
		if(empty($pass)){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your Password</div>";
		}
		if(empty($email)){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your email</div>";
		}
		if(empty($full)){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your fullname</div>";
		}
		if(strlen($name)<4){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your name great than 4 char</div>";
		}
		if(strlen($name)>20){
			$errorlist[]= "<div class='alert alert-danger text-center'>you must enter your name less than 20 char</div>";
		}

		if(!empty($errorlist)){
			foreach ($errorlist as $error) {
				echo "<div style='position: absolute;
								right: 254px;
								top: 57px;
								padding: 8px;
								width: 500px' >" . $error . "</div>";
			}
			
		}else{
			
			move_uploaded_file($avatartmp, "images/" . $avtarupload);

			$dbconnect=mysql_query("INSERT into users(username,password,email,fullname,userimage)values('$name','$pass','$email','$full','$avtarupload')") or die(mysql_error());
			

			 
			if(isset($dbconnect)){
				echo "<div class='alert alert-success text-center' style='position: absolute;
									right: 254px;
									top: 57px;
									padding: 8px;
									width: 500px'>تم تسجيل عضويتك</div>";
			}
		}
			}
			else{
				//echo "<div class='alert alert-danger text-center'>you cannot access here</div>";

			}
			echo "</div>";

?>
<div class="reg">

	<h1 class="text-center">عضو جديد</h1>
	
		
	<form  action="register.php" method="POST" enctype="multipart/form-data">
		

		<div class="form-group" style="text-align:right  !important;">
			<label class="col-sm-2 control-label pull-right">الاسم</label>
			

				<input  type="text" name="name"  autocomplete="on" required class="form-control" />
			
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">رقم المرور</label>
			
			<input  type="password" name="pass"  autocomplete="new-password" required class="form-control"/>

		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">الايميل</label>
		
			<input  type="email" name="email" autocomplete="on" required class="form-control"/>
		
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">الاسم بالكامل</label>
			
			<input type="text" name="fullname" autocomplete="on" required class="form-control"/>
			
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">اختر الصورة</label>
				
			<input type="file" name="profile" autocomplete="on" required class="form-control" value="<?php echo  $selectuser_fetch->userimage; ?>"/>

		</div>
				
			
			
		<div class="form-group">	
			<input type="submit" name="submit" value="حفظ" class="btn btn-block btn-primary" style="max-width: 108px;
										margin-right: 304px;
										margin-top: 22px">
		</div>
	</form>
</div>
	
	<?php ?>
<div class="clear"></div>
	<?php include_once "files\block.php"; ?>
	<div class="clear"></div>
<?php include "files\\footer.php"; ?>