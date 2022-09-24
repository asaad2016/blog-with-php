 </div>

	        <div class="block1"> 	
        	<div class="titleblock">
	        
	            <?php 
	             if(isset($_COOKIE['uid']) and isset($_COOKIE['login'])){
	           		 ?>
					<table width="95%">
             			<tr>
             				<td>
             					رقم العضوية
             				</td>
             				<td>
             					<?php echo u_id; ?>
             				</td>
             			</tr>
             			<tr>
             				<td>
             					  اسم العضو 
             				</td>
             				<td>
             				   <?php echo u_name; ?>
             					
             				</td>
             			</tr>
             			<tr>
             				<td>
             					الايميل
             				</td>
             				<td>
             				 <?php echo email; ?>
             					
             				</td>
             			</tr>
             			<tr>
             				<td>
             					الرتبة
             				</td>
             				<td>
             				 <?php 
             				  if(u_lvl==1){
             				 echo "عضو";
             				}
             				elseif(u_lvl==2){
             					 echo "كاتب";

             				}
             				elseif(u_lvl==3){
             					 echo "مدير";

             				}
             				elseif(u_lvl==4){
             					 echo "زائر";

             				}


             				  ?>
             					
             				</td>
             			</tr>
         			</table>
             		<?php
	             	}else
	             	{
             		
             		?>
                 
    
       
    
			<form action="index.php" method="POST">
         		<table width="100%">
         			<tr>
         				<td>
         					اسم المستخدم
         				</td>
         				<td>
         					<input type="text" name="username">
         				</td>
     				</tr>
     				<tr>
         				<td>
         					كلمة المرور
         				</td>
         				<td>
         					<input type="password" name="password" style="margin-top: 10px">
         				</td>
                    </tr> 
         				
         			<tr>
         				
         				<td colspan="2" align="center">
         					<input type="submit" name="login" value="login" class="btn btn-primary" style="margin-top: 10px">
         				</td>
         			</tr>
         		</table>
             		<?php }?>
             		
         	</form>
            </div>

            
             <?php
$selectmenu=mysql_query("select * from menu order by id DESC");
if(mysql_num_rows($selectmenu)>0){
    while ( $selectmenu_fetch= mysql_fetch_array($selectmenu)) {

         ?> 
        
        
            <div class="titleblock"><h3><?php echo $selectmenu_fetch['title'];
             ?></h3>
             <div class="contentblock"><?php echo $selectmenu_fetch['content']; ?></div>
            </div>

         
                        
            <?php 
                 }
             }
             ?>
             </div>
    		 <div class="clear"></div>		

	           
	          
	      

				
				
		
		