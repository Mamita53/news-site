<?php
include "config.php";
$post_id =$_GET['id'];
$cat_id =$_GET['catid'];



$sql1 ="SELECT *FROM post WHERE post_id ={$post_id }";
$result1 =mysqli_query($conn,$sql1) or die("Query failed :SELECT");
$row =mysqli_fetch_assoc($result1);

/* print the row to find the image name's row (post_image) 
echo"<pre>";
print_r($row);
echo"</pre>";
die();
*/

Unlink("upload/".$row['post_img']);

$sql ="DELETE FROM post WHERE post_id ={$post_id };";
$sql .="UPDATE category SET post = post-1 WHERE category_id={$cat_id}";

/*if(mysqli_multi_query($conn,$sql)){
    header("location:{$hostname}/admin/post.php");
}else{
    echo"Query failed";
}*/

// another method
$result =(mysqli_multi_query($conn,$sql));
if($result){
    header("location:{$hostname}/admin/post.php");
}else{
    echo"Query failed";
}

?>