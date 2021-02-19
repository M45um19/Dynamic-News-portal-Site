<?php


                    include "configure.php";
                    if(isset($_FILES['post_image'])){
                        $errors = array();
                        $file_name = $_FILES['post_image']['name'];
                        $file_size = $_FILES['post_image']['size'];
                        $file_tmp = $_FILES['post_image']['tmp_name'];
                        $file_type = $_FILES['post_image']['type'];
                        $file_ext = end(explode('.',$file_name));


                        $extentions = array("jpeg","jpg","png","PNG","JPG","JPEG");
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
                            header("location: add_post.php?error=100");
                            die();
                        }
                    }

                    session_start();
                    $post_title = mysqli_real_escape_string($connection,$_POST['post_title']);
                    $post_id = mysqli_real_escape_string($connection,$_POST['post_id']);
                    $post_desc = mysqli_real_escape_string($connection,$_POST['post_desc']);
                    $category = mysqli_real_escape_string($connection,$_POST['category']);
                    $date = date("D M, Y");
                    $author = $_SESSION['id'];
                    $query = "INSERT INTO post(post_id,post_desc,category,post_date,author,image,post_title) VALUES('{$post_id}','{$post_desc}','{$category}','{$date}','{$author}','{$new_name}','{$post_title}');";
$query .= "UPDATE category SET number_of_post = number_of_post + 1 WHERE category_id = {$category}";
if(mysqli_multi_query($connection,$query)){
    header("location: post.php");
}else{
    echo "Faild2";
}


?>