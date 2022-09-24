<?php include_once "files\header.php";
include_once "include\\functions_link.php";
?>
	<?php 
		$catid=$_GET['id'];
		$querypost_cat=mysql_query("select posts.*,users.username,users.userimage from posts,users,category where posts.userid=users.userid and catid=" . $catid . " and posts.catid=category.id order by id DESC limit " .  changeperpage());
		$querypost_cat_num=mysql_num_rows($querypost_cat);
		if($querypost_cat_num >0){
			while($fetchpost=mysql_fetch_object($querypost_cat)){
				?>
				
				<div class="rightco" style="margin-top: 15px;min-height: 501px;">
				
					<div class="b_t_in">
						<div class="title-b">
							<h3><?php echo $fetchpost->title; ?></h3>
						</div>
						<div class="info">

							<img src="images/<?php echo $fetchpost->userimage; ?>" height="50" width="50" class="img-responsive img-circle img-thumbnail">
							<?php echo $fetchpost->username; ?>
							<br>
							<?php 
							echo $fetchpost->time;
							
							?>
							
						</div>
					</div>
					<div class="pic">
						<img width="255" height="225" src="images/<?php 
							echo $fetchpost->image;
							
							?>">
						
					</div>
					<div class="pic">
						<p>

						<?php
							$s=mb_substr($fetchpost->sub, 0,50,"UTF-8");
						 echo $s . "......."; ?>
						</p>
						<a href="readmore.php?id=<?php echo $fetchpost->id; ?>"> اقرا المزيد.......</a>
					<div class="clear">
					
					</div>
					</div>
					<div class="clear">
					
				    </div>
						
					

				</div>
				<div class="clear"></div>

			<?php
			 } 
		 }
		else{
			echo "<div class='alert alert-danger' style='min-height: 507px;''>عفوا لا توجد مقالات</div>";
		}

			 ?>
			 <div class="text-center" style="margin-top: 10px;margin-bottom: 10px;">
     <?php
     	tablename("category");
        echo paginate();

      ?>
    </div>
			
	
<?php include_once "files\block.php"; ?>
	<div class="clear"></div>
<?php include "files/footer.php"; ?>