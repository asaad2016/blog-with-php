<?php include_once "files\header.php";

	if(isset($_GET['id'])){

		$id=$_GET['id'];
		$querypost=mysql_query("select posts.*,users.username from posts,users where posts.userid=users.userid and id={$id} order by id DESC");
	}

		while($fetchpost=mysql_fetch_object($querypost)){
			?>
			<div class="rightco readme" style="margin-top: 14px">
				<div class="b_t_in">
					<div class="title-b">
						<h3><?php echo $fetchpost->title; ?></h3>
					</div>
					<div class="info">
						<?php echo $fetchpost->username; ?>
						<br>
						<?php echo $fetchpost->time; ?>
						
					</div>
				</div>
				<div class="pic">
					<img src="images/logo.jpg">
					
				</div>
				<div class="pic">
					<p style="overflow: hidden;">
					<?php echo $fetchpost->sub; ?>
					</p>
				</div>

				
             </div>
             	          
           <?php
	       }
	       ?>
	       <div class="clear"></div>
	       <?php

	           	$id=$_GET['id'];
					$queryP_c=mysql_query("select comment.*,users.username,users.userimage from comment,users where comment.userid=users.userid and postid=" . $id . " and approve=1 order by id DESC");
					
				?>
				<div class="comment">
					<div style="width:100%;background-color: red">
		            <h2>عدد التعليقات :  <span><?php echo mysql_num_rows($queryP_c); ?></span></h2>
		            </div>
		            <hr style="margin: 20px 5px;border-bottom: 5px solid black;">
					 <?php
					if(mysql_num_rows($queryP_c)>0){
						while($squer_p_c_f=mysql_fetch_object($queryP_c)){		
			           ?>

					       		<div class="9">
					       			<img src="images/<?php echo $squer_p_c_f->userimage; ?>" height="50" width="50" class="img-responsive img-circle img-thumbnail" >
					       			 <h3 style="font-size: 20px; display: inline-block;"><?php echo $squer_p_c_f->username; ?></h3>
					       			 <h6 style="font-size: 13px;"><?php echo $squer_p_c_f->date_c; ?></h6>
									 <p style="font-size: 15px;padding: 8px;line-height: 1.7">
									 <?php echo $squer_p_c_f->comment; ?>
									 </p>
									 </div>
									  <hr style="margin: 5px;border-bottom: 3px solid black;">
									 <?php
						
							}
					}
					else
					{
							echo "<h2>لا توجد تعليقات حاليا</h2>";
					}
					?>
				</div>
		        <div class="" style="margin-top: 10px;">
					<h2 style="width: 100%;height: 70px;line-height: 70px;color: white;background-color: #bbb;">اضف تعليقة</h2>
					<form class="form-group" method="POST">
						<textarea class="" style="height: 120px;width: 500px;margin-right: 50px;padding: 10px;font-size: 23px;" name="comment"></textarea>
							<br><br>

						<input type="submit" name="addcomment" value="حفظ" style="margin-right:220px;width: 100px;" class="btn btn-success">
					</form>
				</div>
	          
		<?php 

		if(isset($_POST['addcomment'])){

			$comment=strip_tags($_POST['comment']);
			if(empty($comment)){
			echo "<div class='alert alert-danger text-center'>يجب كتباة محتوي التعليق</div>";
			}
			else{
			 	$querycomment=mysql_query("insert into comment(userid,comment,postid) values (" . $_COOKIE['uid'] . ",'$comment'," . $id . ")");
			 	if(isset($querycomment)){
			 		echo "<div class='alert alert-success text-center'>لقد تم اضافة تعليقك</div>";
			 		refresh("readmore.php?id=$id",1);
			 	}
			}
		}

		?>			
		          
					
		<?php include_once "files\block.php"; ?>
			<div class="clear"></div>
		<?php include "files\\footer.php"; ?>
				