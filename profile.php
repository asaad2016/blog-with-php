
<?php include_once "files\header.php";
if(isset($_COOKIE['uid'])){
	$id=$_COOKIE['uid'];
}
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
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال اسم المستخدم</div>";
	}
	if(empty($pass)){
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال  كلمة المرور</div>";
	}
	if(empty($email)){
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال  الايميل</div>";
	}
	if(empty($full)){
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال  الاسم بالكامل</div>";
	}
	if(strlen($name)<4){
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال اسم المستخدم اكبر من 4 احرف</div>";
	}
	if(strlen($name)>20){
		$errorlist[]= "<div class='alert alert-danger text-center'>يجب ادخال اسم المستخدم اقل من 20 احرف</div>";
	}
		
	if(!empty($errorlist)){
		foreach ($errorlist as $error) {
			echo $error ;
		}
		
	}else{
			
		move_uploaded_file($avatartmp, "images/" . $avtarupload);
		$dbconnect_update=mysql_query("UPDATE  users SET username='$name',password='$pass',email='$email',fullname='$full',userimage='$avtarupload' where userid=" . $id . "");
 
		if(isset($dbconnect_update)){
					echo "<div class='alert alert-success text-center' style='position: absolute;
							right: 254px;
							top: 57px;
							padding: 8px;
							width: 500px'>تم تحديث بياناتك الشخصية</div>";
			refresh("profile.php",1);
		}
	}
}

echo "</div>";

$selectuser=mysql_query("select * from users where userid=" . $id . "");

 $selectuser_fetch= mysql_fetch_object($selectuser) ;

 ?>

<div class="reg">

	<h1 class="text-center">تحديث العضوية</h1>
	
	
	<form action="profile.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">الاسم</label>
			
				<input  type="text" name="name"  autocomplete="on" required class="form-control" value="<?php echo  $selectuser_fetch->username; ?>" />
			
			
	    </div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">رقم المرور</label>
			
				
				<input  type="password" name="pass"  autocomplete="new-password" required class="form-control" value="<?php echo  $selectuser_fetch->password; ?>"/>
		

			
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">الايميل</label>
			
			
				<input  type="email" name="email" autocomplete="on" required class="form-control" value="<?php echo  $selectuser_fetch->email; ?>"/>
			
			

		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label pull-right">الاسم بالكامل</label>
		
				<input type="text" name="fullname" autocomplete="on" required class="form-control" value="<?php echo  $selectuser_fetch->fullname; ?>"/>
			
			
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
	
<?php
	

include_once "files\block.php"; ?>
<?php include "files\\footer.php"; ?>