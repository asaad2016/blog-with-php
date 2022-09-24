<?php

if(isset($_POST['addcat1'])){
	if(isset($_POST['addcat1'])){
	$name=strip_tags($_POST['name']);

	//================================================================
		if(!empty($name)){
		$queryu=mysql_query("insert into category(name)values('$name')");
			if(isset($queryu)){
				echo "<div class='alert alert-success text-center'>تم اضافة تصنيف جديد</div>";
			}
		}
		else
		{
			echo "<div class='alert alert-danger text-center'>يجب كتابة اسم التصنيف</div>";
		}

	}
}
//===================================================================
if(isset($_REQUEST['cat'])){
	if($_REQUEST['cat']=="delete"){
		$query=mysql_query("delete from category where id=". $_REQUEST['catid'] ."");

		if(isset($query)){
			echo "<div class='alert alert-danger text-center'>تم حذف التصنيف</div>";
		}
	}
}
if(isset($_REQUEST['cat'])){
	if($_REQUEST['cat']=="edit"){

		$queryu=mysql_query("select * from  category where id=". $_REQUEST['catid'] ."");
		$fetchu=mysql_fetch_object($queryu);

			?>
		<div class="a" style="min-height: 500px;">
			<form action="admincb.php?type=addcat&cat=update&catid=<?php echo $fetchu->id; ?>" method="POST">
			<table>
				<tr>
					<td>
						اسم التصنيف
					</td>
					<td>
						<input type="text" name="name" value="<?php echo $fetchu->name; ?>" style="margin-bottom: 10px;" class="form-control">
					</td>
			   </tr>
			   <tr>
					
					<td colspan="2" align="center">
					<input type="submit" name="catupdate" value="تحديث" class="btn btn-primary btn-lg text-center">
							
					</td>
				   </tr>
			</table>
			</form>
			</div>
			</div>
		<?php

	include_once "files\block.php"; ?>

			<?php include "files\\footer.php"; 
			exit;
		
		

	}
	
}



if(isset($_POST['catupdate'])){

	$nameu=strip_tags($_POST['name']);
	$ideu=$_GET['catid'];
	if(!empty($nameu)){
	$queryue=mysql_query("update category set name='$nameu' where id=". $_REQUEST['catid'] ."") or die(mysql_error());
		if(isset($queryue)){
			echo "<div class='alert alert-info text-center'>تم تحديث التصنيف بنجاح</div>";

		refresh("admincb.php?type=addcat",1);
		include_once "files\block.php"; ?>

		<?php include "files\\footer.php"; 
		exit;

		}
	}
	else
	{
		echo "<div class='alert alert-danger text-center'>يجب كتابة اسم التصنيف</div>";
		include_once "files\block.php"; ?>

		<?php include "files\\footer.php"; 
		exit;
	}
	

}
//==================================================================
//===================================================================

//==================================================================
//===================================================================

//==================================================================
?>
<div class="a" style="min-height: 500px;">
	<form method="post" action="admincb.php?type=addcat">
		<table width="100%" border="0">

		<tr>
			<td>
				اسم التصنيف
			</td>
			<td>
				<input type="text" name="name" value="" style="margin-bottom: 10px;" class="form-control">
			</td>
		</tr>


			<tr>
			
			<td colspan="2" align="center">
			
				<input type="submit" name="addcat1" value="حفظ" class="btn btn-primary text-center btn-lg">

			</td>
		</tr>
		</table>
		</form>

	<table style="width: 400px;border:0;">
		<tr>
			<td align="right">
				اسم التصنيف
			</td>
			
			
			<td align="left" style="padding: 20px">
				لوحة التحكم
			</td>
		</tr>
		<?php
		$querycat=mysql_query("select * from category");
	   while($fetchobjcat=mysql_fetch_object($querycat)){
			echo "
				<tr>
					<td align='right'>" . $fetchobjcat->name . "</td>";
				
			echo "
				
					<td align='left'>
						<a href='admincb.php?type=addcat&cat=edit&catid={$fetchobjcat->id}' class='btn btn-info' style='margin-bottom: 10px;'>تعديل</a>
						<a href='admincb.php?type=addcat&cat=delete&catid={$fetchobjcat->id}' class='btn btn-danger' style='margin-bottom: 10px;'>حذف</a>


					</td>
				</tr>";

				

		}
				?>
	</table>
</div>
