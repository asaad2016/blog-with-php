<?php 
include_once "files\header.php";
include_once "include\\functions_link.php";
if(isset($_POST['login'])){
	$name=$_POST['username'];


     $pass=$_POST['password'];
	if(empty($name) or empty($pass)){
        echo "<div class='alert alert-danger text-center'>يجب ادخال اسم المستخدم او كلمة المرور</div>";
        exit();	
	}
		$query=mysql_query("select * from users where username='" . $name. "' and password='" . $pass . "'");
		if(mysql_num_rows($query)>0){
			$fetchobject=mysql_fetch_object($query);
			$uid=$fetchobject->userid;
			$uname=$fetchobject->username;
			$upass=$fetchobject->password;
			if($uname !=$name and $upass !=$pass){
				 echo "<div class='alert alert-danger text-center'>اسم المستخدم او كلمة المرور غير صحيحتان</div>";
	        exit();	
			}
			else
			{
				
				setcookie("uid",$uid,time()+60*60*24);
				setcookie("login",1,time()+60*60*24);
				echo "<div class='alert alert-danger text-center'>Hello  " .	 $name . "</div>";
				refresh("index.php",1	);
			}
		}
}
$querypost=mysql_query("select posts.*,users.username,users.userimage from posts,users where posts.userid=users.userid order by id DESC limit " .  changeperpage());
		while($fetchpost=mysql_fetch_object($querypost)){
			?>
			
			<div class="rightco index">
			
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
			

<?php } ?>
 <div class="text-center" style="margin-top: 10px;margin-bottom: 10px;">
     <?php
        echo paginate();

      ?>
    </div>
			
	
<?php include_once "files\block.php"; ?>
	<div class="clear"></div>
<?php include "files/footer.php"; ?>
		