<?php

    include "configure.php";
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($connection,$query) or die("Faild");
    if($result){
        header("location: users.php");
    }

    mysqli_close($connection);

?>