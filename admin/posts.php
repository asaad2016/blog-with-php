<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
$do=isset($_GET['do']) ? $_GET['do'] : 'manage';
if($do=="delete"){

	$query=mysql_query("delete from posts where id=". $id ."");
	if(isset($query)){
		echo "<div class='alert alert-danger text-center'>تم حذف البوست بنجاح</div>";
			refresh("admincb.php?type=posts&do=manage",1);
	}
	
}
	elseif($do=="edit"){
		
		$queryposts=mysql_query("select * from  posts where id=". $id ."");
		$fetchposts=mysql_fetch_object($queryposts);

			?>
		<div class="a" style="min-height: 500px;">
			<form method="POST" action="admincb.php?type=posts&do=update" enctype="multipart/form-data">	
				<table width="100%" border="0">
					
					<tr>
						<td>
							عنوان التدوينة
						</td>
						<td>
							<input type="text" name="title"   style="margin-bottom: 10px;" class="form-control"
							 value="<?php echo $fetchposts->title; ?>">
							 <input type="hidden" name="id"   style="margin-bottom: 10px;" class="form-control"
							 value="<?php echo $fetchposts->id; ?>">
						</td>
					</tr>
					<tr>
						<td>
							صوره التدوينة
						</td>
						<td>
					   	 <input type="file" name="pc" style="margin-bottom: 10px;" class="form-control"
					   	 value="<?php echo $fetchposts->pc; ?>">
						</td>
					</tr>
					
					<tr>
						<td>
							المقالة
						</td>
						<td>
							<textarea name="sub" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ><?php echo $fetchposts->sub; ?></textarea>
							 
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
				    			 echo '
				    			
								
								
				    			
								
								   <option value="' . $fetchobjcat->id . '"';

							     if($fetchposts->catid == $fetchobjcat->id){echo "selected";}
							     echo '>' . $fetchobjcat->name . '</option>';
								
								
							}
							?>
							</select>
						</td>
				 	</tr>
					
					<tr>
						
						<td colspan="2" class="text-center">
						
							<input type="submit" name="updatepost" value=" تعديل" class="btn btn-primary" style="width: 100px !important;">

						</td>
					</tr>
				</table>
			</form>
		</div>	
		<?php 
	

	
}
elseif($do=="update"){

	$id=strip_tags($_POST['id']);
	$namep=strip_tags($_POST['title']);
	$cat=strip_tags($_POST['cat']);
	$sub=strip_tags($_POST['sub']);
	$avatartmp=$_FILES['pc']['tmp_name'];
	$avatarname=$_FILES['pc']['name'];
	$avtarupload=rand(0,1000000) . "_" . $avatarname;
	$errarr1=array();
		if(empty($namep)){
			$errarr1[]= "<div class='alert alert-danger text-center'>يجب كتابة اسم البوست</div>";
		}
		if(empty($sub)){
			$errarr1[]="<div class='alert alert-danger text-center'>يجب كتابة محتوي البوست</div>";
		}
		if(empty($cat)){
			$errarr1[]="<div class='alert alert-danger text-center'>يجب اختيلر اسم التصنيف</div>";
		}
		if(empty($avatarname)){
			$errarr1[]="<div class='alert alert-danger text-center'>يجب اختيلر الصور</div>";
		}
		if(empty($errarr1))
		{
			move_uploaded_file($avatartmp, "images/" . $avtarupload);

			$queryuepost=mysql_query("update posts set title='$namep',sub='$sub',image='$avtarupload',time= now(),catid='$cat'  where id=". $id . "") or die(mysql_error());
			if(isset($queryuepost)){
				echo "<div class='alert alert-info text-center'>تم تحيث البوست بنجاح</div>";
				
				refresh("admincb.php?type=posts&do=manage",1);	
			}
		}
		else
		{
			foreach ($errarr1 as $error) {
				echo $error ;
			}
		}
	}


//===================================================

elseif($do=="manage"){
	?>
<div class="a manage" style="min-height: 500px;">
	<table width="100%" border="0">
 		<tr>
			<td align="right">
			لوحة التحكم
			</td>
			<td align="left">
				اسم التصنيف
			</td>
		</tr>
		<?php
		$querypost=mysql_query("select * from posts");
       while($fetchobjpost=mysql_fetch_object($querypost)){

			echo "
				<tr>
					<td align='right'>" . $fetchobjpost->title . "</td>";
				
			echo "
				
					<td align='left'>
						<a href='admincb.php?type=posts&do=edit&id={$fetchobjpost->id}' class='btn btn-info'>تعديل</a>
						<a href='admincb.php?type=posts&do=delete&id={$fetchobjpost->id}' class='btn btn-danger'>حذف</a>


					</td>
				</tr>";

			}
			?>
	</table>
</div>
<?php }