<?php
if($_POST)
{
	$name=strip_tags($_POST['name']);
	$url=strip_tags($_POST['url']);
	$email=strip_tags($_POST['email']);
	$desc=strip_tags($_POST['desc']);
	$key=strip_tags($_POST['key']);
	$close=strip_tags($_POST['close']);
	$close_txt=strip_tags($_POST['close_txt']);
	$copy=strip_tags($_POST['copy']);
	if(empty($name)){
			echo "<div class='alert alert-danger text-center'>يجب كتابة اسم الموقع</div>";
		}
		elseif(empty($url)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة رابط الموقع</div>";
		}
		elseif(empty($email)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة ايميل الموقع</div>";
		}
		elseif(empty($desc)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة وصف الموقع</div>";
		}
		elseif(empty($key)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة الكلمات المفتاحية للموقع</div>";
		}
		elseif(empty($close)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة حالة الموقع</div>";
		}
		elseif(empty($close_txt)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة رسالة اغلاق الموقع</div>";
		}
		elseif(empty($copy)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة حقوق الموقع</div>";
		}
		else{

				$queryu=mysql_query("update config set
							name='$name',
							url='$url',
							email='$email',
							f_desc='$desc',	
							f_key='$key',
							close=$close,
							close_txt='$close_txt',	
							f_copty ='$copy'



					");
		if(isset($queryu)){
			echo "<div class='alert alert-success text-center'>تم تحديث بيانات الموقع بنجاح</div>";
			refresh("admincb.php?type=setting",1);

		}
	}
}

$query=mysql_query("select * from config");
$fetchobj=mysql_fetch_object($query);

?>
<div class="a" style="min-height: 500px;">
	<form method="post" action="admincb.php?type=setting">
		<table width="100%" border="0">
			
			<tr>
				<td>
					اسم الموقع
				</td>
				<td>
					<input type="text" name="name" value="<?php echo $fetchobj->name; ?>" style="margin-bottom: 10px;" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					رابط الموقع
				</td>
				<td>
			   	 <input type="text" name="url" value="<?php echo $fetchobj->url; ?>" style="margin-bottom: 10px;" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					بريد الموقع
				</td>
				<td>
					<input type="email" name="email" value="<?php echo $fetchobj->email; ?>" style="margin-bottom: 10px;" class="form-control">
					
				</td>
			</tr>
			<tr>
				<td>
					وصف الموقع
				</td>
				<td>
					<textarea name="desc" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ><?php echo $fetchobj->f_desc; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					كلمات مفتاحية
				</td>
				<td>
					<textarea name="key" style="width: 300px;height: 100px;padding: 10px;margin-bottom: 10px;" class="form-control"><?php echo $fetchobj->f_key; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
						حالة الموقع
				</td>
				<td>
					<select name="close" style="margin-bottom: 10px;" class="form-control">
					<?php 
					if($fetchobj->close==0){
						echo '
						<option value="0">مفتوح</option>
						<option value="1">مغلق</option>';
						
					}
					else
					{
						echo '
						<option value="1">مغلق</option>	
						<option value="0">مفتوح</option>';
						
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
						رسالة القفل
				</td>
				<td>
					<textarea name="close_txt" style="width: 300px;height: 100px;padding: 10px;margin-bottom: 10px;" class="form-control"><?php echo $fetchobj->close_txt; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					حقوق الموقع
				</td>
				<td>
					<input type="text" name="copy" value="<?php echo $fetchobj->f_copty; ?>" style="margin-bottom: 10px;" class="form-control">
				</td>
			</tr>
			<tr>
				
				<td colspan="2" style="text-align: center;">
				
					<input type="submit" name="save" value="save" class="btn btn-primary" style="width: 100px;">

				</td>
			</tr>
		</table>
	</form>
</div>