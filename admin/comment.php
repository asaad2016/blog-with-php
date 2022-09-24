<?php
if(isset($_GET['id'])){
	$id=intval($_GET['id']);
}
if(isset($_REQUEST['comments'])){
	if($_REQUEST['comments']=="edit"){
	
	$updatecomment=mysql_query("update comment set approve=1 where id=" . $id);
		if(isset($updatecomment)){
			echo "<div class='alert alert-info text-center'>تم المواغقة علي التعديل</div>";
		}
	}

}

?>
<div class="a manage" style="min-height: 500px;">
	<table width="100%" border="0">
	 	 <tr>
			
			
			
		   <td style="max-width:70%" align="right">
					التعليقات
			</td>
			<td style="max-width:26%;padding: 20px" align="left">
			
				لوحة التحكم
			</td>
		</tr>
		<?php
		$querycomment=mysql_query("select * from comment where approve=0");
		if(mysql_num_rows($querycomment)){
	       while($fetchcomment=mysql_fetch_object($querycomment)){
	      
 
			
				echo "
					<tr>
						<td align='right' style='max-width:70%'>" . $fetchcomment->comment . "</td>";
					
				echo "
					
						<td align='left' style='max-width:30%'>
							<a href='admincb.php?type=comment&comments=edit&id={$fetchcomment->id}' class='btn btn-info' >تعديل</a>
							<a href='admincb.php?type=comment&comments=delete&id={$fetchcomment->id}' class='btn btn-danger' >حذف</a>


						</td>
					</tr>";

					

		
		?>
		</table>

	<?php 
	}
}
else
{
	?>
	
	<tr>
		<td rowspan="2" colspan="2" align='center'><div class='alert alert-info'  style="vertical-align: middle;">لا توجد تعليقات معلقة</div></td>
	

	</tr>";

	
	</table>

	
	<?php
	
	
		
		
}
?>

</div>


	