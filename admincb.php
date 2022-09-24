
<?php
if(isset($_COOKIE['login']) && $_COOKIE['login']==1){
  include_once "files\header.php";

  if((u_lvl)){
    if(u_lvl==3){
      $queryP_c_admn=mysql_query("select * from comment where approve=0");
      echo "<div class='main_admin'>";
      echo "<a href='admincb.php?type=setting' class='btn btn-info' style='display:inline-block;'>اعدادات الموقع</a>";
      echo "<a href='admincb.php?type=addpost' class='btn btn-info' style='display:inline-block;margin-right:5px;'>اضافة تدوينة</a>";
      echo "<a href='admincb.php?type=addcat' class='btn btn-info' style='display:inline-block;margin-right:5px;'>اضافة تصنيف</a>";
      echo "<a href='admincb.php?type=posts&do=manage' class='btn btn-info' style='display:inline-block;margin-right:5px;'>الدوينات</a>";
      echo "<a href='admincb.php?type=comment' class='btn btn-info' style='display:inline-block;margin-right:5px;'>التعليقات المعلقة   " . mysql_num_rows($queryP_c_admn) . "</a>";
      echo "<a href='admincb.php?do=manage&type=menu' class='btn btn-info' style='display:inline-block;margin-right:5px;'>القوائم</a>";
      echo "<a href='admincb.php?type=ads' class='btn btn-info' style='display:inline-block;margin-right:5px;'>الاعلانات</a>";
      echo "</div>";
       echo "<div class='adminco'>";
        
      if(isset($_GET['type'])){
        if($_GET['type']=="setting"){
          include "admin/setting.php";

        }
        elseif($_GET['type']=="addpost"){
          include "admin/addpost.php";

        }
       elseif($_GET['type']=="addcat"){
          include "admin/addcat.php";

        }
        elseif($_GET['type']=="posts"){
          include "admin/posts.php";

        }
        elseif($_GET['type']=="comment"){
          include "admin/comment.php";
        }
           elseif($_GET['type']=="menu"){
          include "admin/menu.php";


        }
         elseif($_GET['type']=="ads"){
          include "admin/ads.php";
          

        }
      }
      else{
        include "admin/setting.php";
      }
       echo "</div>";
     }
  }






 include_once "files\block.php"; ?>
 <div class="clear"></div>
 <?php include "files\\footer.php"; 
}
else{
	header('Location:index.php');
}