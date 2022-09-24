<?php
	$queryads=mysql_query("select * from ads");
	 $fetchads=mysql_fetch_object($queryads);



?>
<div class="a" style="min-height: 500px;">
	<form method="post" action="admincb.php?type=ads" enctype="multipart/form-data">
		<table width="100%" border="0">
			
			
			<tr>
				<td>
					الاعلان الاول
				</td>
				<td>
					<textarea name="code1" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ><?php echo $fetchads->code1; ?></textarea>
					 
				</td>
			</tr>
			
			<tr>
				<td>
						الحالة
				</td>
				<td>
					<select name="active1" style="margin-bottom: 10px;" class="form-control">
					
						
						<?php
				
							if($fetchads->active1==0){
		    			 echo "
		    			
						
						   <option value='0'>غير نشط</option>
						    <option value='1'>نشط</option>";
					}
					else
					{
						 echo "
		    			
						   <option value='1'>نشط</option>
						   <option value='0'>غير نشط</option>";
						 
					}
					?>
						
					
					</select>
				</td>
		 	</tr>
			<tr>
				<td>
					الاعلان الثاني
				</td>
				<td>
					<textarea name="code2" style="width: 300px;height: 100px;padding: 10px; margin-bottom: 10px;" class="form-control" ><?php echo $fetchads->code2; ?></textarea>
					 
				</td>
			</tr>
			
			<tr>
				<td>
						الحالة
				</td>
				<td>
					<select name="active2" style="margin-bottom: 10px;" class="form-control">
					
						
						<?php
					
							if($fetchads->active2==0){
		    			 echo "
		    			
						
						   <option value='0'>غير نشط</option>
						    <option value='1'>نشط</option>";
					}
					else
					{
						 echo "
		    			
						   <option value='1'>نشط</option>
						   <option value='0'>غير نشط</option>";
						 
					}
					?>
						
					
					</select>
				</td>
		 	</tr>
			<tr>
				
				<td align="center" colspan="2">
				
					<input type="submit" name="update" value="تحديث" class="btn btn-primary text-center">

				</td>
			</tr>
		</table>
	</form>
</div>
<?php
if(isset($_POST)){
	if(isset($_POST['update'])){
		$code1=strip_tags($_POST['code1']);
		$active1=strip_tags($_POST['active1']);
		$code2=strip_tags($_POST['code2']);
		$active2=strip_tags($_POST['active2']);
		$arr_err=array();
		if(empty($code1)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة محتوي الاعلان الاول</div>";
		}
		elseif(empty($code2)){
			echo "<div class='alert alert-danger text-center'>يجب كتاب محتوي الاعلان الثاني</div>";
		}
		
			else{
				$query_u_ads="update ads set code1='$code1',active1='$active1', code2='$code2',active2='$active2'";
			$update=mysql_query($query_u_ads) or die(mysql_error());
			if(isset($update)){
					echo "<div class='alert alert-danger text-center'>تم تحديث الاعلان بنجاح</div>";
				refresh("admincb.php?type=ads",1);
			}
		}
	}
}
