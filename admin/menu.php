<?php
$do=isset($_REQUEST['do']) ? $_REQUEST['do'] : 'manage';
if(isset($_GET['id'])){
		$id=$_GET['id'];
}
if ($do=='insert'){
	if ($_SERVER['REQUEST_METHOD']=='POST'){

		$title=strip_tags($_POST['title']);
		$content=strip_tags($_POST['content']);
		$order=strip_tags($_POST['order']);
		$errorlist3=array();	
		if(empty($title)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  اسم القائمة</div>";
		}
		if(empty($content)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  محتوي القائمة</div>";
		}
		if(empty($order)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  ترتيب القائمة</div>";
		}
		if(!empty($errorlist)){
			foreach ($errorlist3 as $error3) {
				echo $error3 ;
			}
			
		}else{

			$add_menu=mysql_query("insert into 	menu(title,content,ord)values('$title','$content','$order')");
			if(isset($add_menu)){
			echo "<div class='alert alert-info text-center'>تمت اضافة قائمة جديدة بنجاح</div>";
			refresh("admincb.php?do=manage&type=menu",1);


			}
		}
	}
}
elseif ($do=='add'){
//if ($_SERVER['REQUEST_METHOD']=='POST'){

?>
<div class="a" style="min-height: 500px;">
	<form method="POST" action="admincb.php?type=menu&do=insert">
		<table width="100%" border="0">
			
			<tr>
				<td>
				اسم القائمة
				</td>
				<td>
					<input type="text" name="title"   style="margin-bottom: 10px;" class="form-control">
				
				</td>
			</tr>
			
			<tr>
				<td>
					المحتوي
				</td>
				<td>
					<textarea name="content" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ></textarea>
					 
				</td>
			</tr>
			
	       <tr>
				<td>
			الترتيب
				</td>
				<td>
					<input type="text" name="order"   style="margin-bottom: 10px;" class="form-control">
				
				</td>
			</tr>
			
			<tr>
				
				<td colspan="2" align="center">
				
					<input type="submit" name="addmenu" value="حفظ" class="btn btn-primary text-center btn-lg">

				</td>
			</tr>
		</table>
	</form>
</div>
<?php

//}
}
elseif ($do=='manage'){
//if ($_SERVER['REQUEST_METHOD']=='POST'){
?>
<div class="a manage" style="min-height: 500px;">
	<table width="100%" border="0">
 		<tr>
			<td align="right">
				القوائم
			</td>
			
			
			<td align="left">
				لوحة التحكم
			</td>
		</tr>
		<?php
	
		$querymenu=mysql_query("select * from menu");
        while($fetchobjmenu=mysql_fetch_object($querymenu)){

			echo "
				<tr>
					<td align='right'>" . $fetchobjmenu->title . "</td>";
				
			echo "
				
					<td align='left'>
						<a href='admincb.php?type=menu&do=edit&id={$fetchobjmenu->id}' class='btn btn-info'>تعديل</a>
						<a href='admincb.php?type=menu&do=delete&id={$fetchobjmenu->id}' class='btn btn-danger'>حذف</a>


					</td>
				</tr>";

			}
			?>
	</table>
	
</div>
<a href='admincb.php?do=add&type=menu' class='btn btn-success btn-lg' style="margin: 70px 284px;">اضافة</a>
<?php
//}
}
elseif ($do=='edit'){

	$id=intval($_GET['id']);
	$selectmenu=mysql_query("select * from menu where id=" . $id);
	$selectmenufetch=mysql_fetch_object($selectmenu);

	?>
	<div class="a" style="min-height: 500px;">
		<form method="POST" action="admincb.php?type=menu&do=update">
			<table width="100%" border="0">
				
				<tr>
					<td>
					اسم القائمة
					</td>
					<td>

						<input type="text" name="title"  value="<?php echo $selectmenufetch->title; ?>" style="margin-bottom: 10px;" class="form-control">
					
					</td>
				</tr>
				
				<tr>
					<td>
						المحتوي
					</td>
					<td>
						<textarea name="content" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ><?php echo $selectmenufetch->content; ?></textarea>
						 
					</td>
				</tr>
				
		       <tr>
					<td>
				الترتيب
					</td>
					<td>
						<input type="text" name="order"   style="margin-bottom: 10px;" class="form-control" value="<?php echo $selectmenufetch->ord; ?>">
					
					</td>
				</tr>
					<tr>
						<td>
								<input  type="hidden" name="id" value="<?php echo $selectmenufetch->id ?>" />
						</td>
				</tr>
				<tr>
					
					<td colspan="2" align="center" >
					
						<input type="submit" name="add" value="تعديل" class="btn btn-primary text-center btn-lg">

					</td>
				</tr>
				
			</table>
		</form>
	</div>
<?php
//}

}
elseif ($do=='update'){
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$id=strip_tags($_POST['id']);
		$title=strip_tags($_POST['title']);
		$content=strip_tags($_POST['content']);
		$order=strip_tags($_POST['order']);
		$errorlist3=array();
		if(empty($title)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  اسم القائمة</div>";
		}
		if(empty($content)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  محتوي القائمة</div>";
		}
		if(empty($order)){
			$errorlist3[]= "<div class='alert alert-danger text-center'>يجب ادخال  ترتيب القائمة</div>";
		}
		if(!empty($errorlist)){
			foreach ($errorlist3 as $error3) {
				echo $error3 ;
			}
			
		}else{
			$update_menu=mysql_query("update menu set title='$title',content='$content',ord='$order' where id=" . $id . "");
			if(isset($update_menu)){
					 echo "<div class='alert alert-info text-center'>تم تحيث القائمة</div>";
					refresh("admincb.php?do=manage&type=menu",1);

			}
		}
	}
}
elseif ($do=='delete'){
	if ($_SERVER['REQUEST_METHOD']=='GET'){
       $id=$_GET['id'];
		

		$delete_menu=mysql_query("delete from menu  where id=" . $id . "");
		if(isset($delete_menu)){
	      echo "<div class='alert alert-info text-center'>تم حذف القائمة بنجاخ</div>";
  		refresh("admincb.php?do=manage&type=menu",1);
		}
	
	}
}