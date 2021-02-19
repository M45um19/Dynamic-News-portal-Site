<?php

    include "configure.php";
    $id = $_GET['id'];
    $query = "DELETE FROM category WHERE category_id = '$id'";
    $result = mysqli_query($connection,$query) or die("Faild");
    if($result){
        header("location: category.php");
    }

    mysqli_close($connection);

?>