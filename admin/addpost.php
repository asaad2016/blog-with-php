<?php



if($_POST){
	if(isset($_POST['addpost'])){
		$title=strip_tags($_POST['title']);
		$sub=strip_tags($_POST['sub']);
		$cat=strip_tags($_POST['cat']);


		$cat=strip_tags($_POST['cat']);
		$avatartmp=$_FILES['avtar']['tmp_name'];
		$avatarname=$_FILES['avtar']['name'];
		$avtarupload=rand(0,1000000) . "_" . $avatarname;
	
		$errarr=array();
		if(empty($title)){
			$errarr[]= "<div class='alert alert-danger text-center'>يجب كتابة اسم البوست</div>";
		}
		if(empty($sub)){
			$errarr[]="<div class='alert alert-danger text-center'>يجب كتابة محتوي البوست</div>";
		}
		if(empty($cat)){
			$errarr[]="<div class='alert alert-danger text-center'>يجب اختيلر اسم التصنيف</div>";
		}
		if(empty($avatarname)){
			$errarr[]="<div class='alert alert-danger text-center'>يجب اختيلر الصور</div>";
		}
		if(empty($errarr))
		{
		//================================================================
			move_uploaded_file($avatartmp, "images/" . $avtarupload);
			$queryu=mysql_query("insert into posts(title,sub,time,userid,image,catid)values('$title','$sub',now()," . $_COOKIE['uid'] . ",'$avtarupload'," . $cat . ")");
			if(isset($queryu)){
				echo "<div class='alert alert-success text-center'>تم اضافة بوست جديد</div>";
					refresh("admincb.php?type=posts&do=manage",1);	
			}
		}
		else
		{
			foreach ($errarr as $error) {
				echo $error ;
			}
		}

	}
}
//===================================================================
/*$query=mysql_query("select * from config");
$fetchobj=mysql_fetch_object($query);*/
//==================================================================
?>
<div class="a" style="min-height: 500px;">
	<form method="post" action="admincb.php?type=addpost" enctype="multipart/form-data">
		<table width="100%" border="0">
			
			<tr>
				<td>
					عنوان التدوينة
				</td>
				<td>
					<input type="text" name="title" value="" style="margin-bottom: 10px;" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					صوره التدوينة
				</td>
				<td>
			  		<input type="file" name="avtar" class="form-control"  style="margin-bottom: 10px;">
				</td>
			</tr>
			
			<tr>
				<td>
					المقالة
				</td>
				<td>
					<textarea name="sub" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ></textarea>
					 
				</td>
			</tr>
			
			<tr>
				<td>
						اسم الصنف
				</td>
				<td>
					<select name="cat" style="margin-bottom: 10px;" class="form-control">
					
						
						<?php
					$querycat=mysql_query("select * from category");
		            while($fetchobjcat=mysql_fetch_object($querycat)){
		    			 echo "
		    			
						
						   <option value='" . $fetchobjcat->id . "''>" . $fetchobjcat->name . "</option>";
					}
					?>
						
					
					</select>
				</td>
		 	</tr>
			
			<tr>
				
				<td colspan="2" align="center">
				
					<input type="submit" name="addpost" value="حفظ" class="btn btn-primary text-center btn-lg">

				</td>
			</tr>
		</table>
	</form>
</div>