<?php
include "config.php";
if($_SESSION["user_role"]== '0')
 {
    header("location:{$hostname}/admin/post.php");
 }
$userid=$_GET['id'];
$sql="DELETE FROM user WHERE user_id='{$userid}'";
if(mysqli_query($conn,$sql)){
    header("location:{$hostname}/admin/users.php");   
}
else{
    echo"cann\'t delete your user records";
}
mysqli_close($conn);
?>