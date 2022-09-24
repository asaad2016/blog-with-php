<?php
function tablename($table="posts"){
	return $table;
}
 function count1(){
		$post_query= mysql_query("select * from " . tablename());
		return mysql_num_rows($post_query);
	}
 function links(){
    $a=explode(",", changeperpage());
    $rows=count1();
    $countrow=ceil($rows/$a[1]);
    return $countrow;

 }

  function getpageandperpage($page=1){
  if(isset($_GET['page']))
    {
      return $page=$_GET['page'];
    }
    else{
       return $page;
    }
 }
 function pageperpage($perpage,$page){
    $start=(getpageandperpage($page) * $perpage) - $perpage;
    return $start . ',' . $perpage;
 }
 function changeperpage($perpage=3,$page=1){
   return pageperpage($perpage,$page);
 }
 function paginate(){
  $linkurl='';
  $a=explode(",", changeperpage());
  for ($i=1; $i <= links(); $i++) { 
            $linkurl .= "<a href='index.php?page=$i&perpage=$a[1]' class='btn btn-warning btn-xs' style='margin-right:5px;'>$i</a>";
         }
         return $linkurl;
    } 






?>