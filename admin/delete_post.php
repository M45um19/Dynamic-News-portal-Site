<?php 

include "configure.php";
$post_id = $_GET['id'];
$category_id = $_GET['cat'];


$query1 = "SELECT * FROM post WHERE post_id = '{$post_id}'";
$result = mysqli_query($connection,$query1) or die("Faild To Delete Image From Directory");
$row = mysqli_fetch_assoc($result);
unlink("uploaded_image/".$row['image']);



$query = "DELETE FROM post WHERE post_id =  '{$post_id}';";
$query .= "UPDATE category SET number_of_post = number_of_post - 1 WHERE category_id = '{$category_id}'";
if(mysqli_multi_query($connection,$query)){
    header("location: post.php");
}else{
    echo "Query Faild!!";
}

?>