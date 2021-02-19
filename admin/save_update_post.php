<?php
 include "configure.php";
 if(empty($_FILES['new_image']['name'])){
     $new_name = $_POST['old_image'];
 }else{
    $errors = array();
    $file_name = $_FILES['new_image']['name'];
    $file_size = $_FILES['new_image']['size'];
    $file_tmp = $_FILES['new_image']['tmp_name'];
    $file_type = $_FILES['new_image']['type'];
    $file_ext = end(explode('.',$file_name));


    $extentions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extentions) == false){
       $errors[] = "wrong file type";
    }
    if($file_size>3500000){
        $errors[] = "Please make the file less than 3mb";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "uploaded_image/".$new_name;
    if(empty($errors) == true){
        move_uploaded_file($file_tmp,$target);
    }else{
        print_r($errors);
        header("location: edit_post.php?id=erorr");
        die();
    }
 }
    
    $query = "UPDATE post SET post_title = '{$_POST["post_title"]}', 
    post_desc = '{$_POST["post_desc"]}', category = '{$_POST["category"]}', 
    image = '{$new_name}' WHERE post_id = '{$_POST["post_id"]}';";
    if($_POST["old_category"] != $_POST["category"]){
    $query .= "UPDATE category SET number_of_post = number_of_post - 1 WHERE category_id = {$_POST["old_category"]};";
    $query .= "UPDATE category SET number_of_post = number_of_post + 1 WHERE category_id = {$_POST["category"]}";
}
    $result = mysqli_multi_query($connection,$query) or die("Faild");
    if($result){
        header("location: post.php");
    }else{
        echo "query faild!!";
    }

?>