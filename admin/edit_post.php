<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Edit Post</title>
    <style>
        .desc{
            height: 200px;
            width: 100%;
        }
        .custom_image{
            height : 100px;
            width : 100px;
        }
    </style>
</head>
<body class="container">
<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("location: index.php");
    }
    if($_SESSION['role']==1){
        header("location: post.php");
    }

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                                <div class="container">
                                    <a class="navbar-brand text-white" href="#">Best News24</a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarText">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="post.php">post</a>
                                        </li>
                                        <?php if($_SESSION['role']==0){ ?>
                            <li class="nav-item">
                            <a class="nav-link" href="category.php">Category</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="users.php">users</a>
                            </li>
                            <?php } ?>
                                    </ul>
                                    <span class="navbar-text text-white">
                                    <a href="logout.php" class="btn btn-outline-danger">Log Out</a>
                                    </span>
                                    </div>
                                </div>
                                </nav>


                                <br>
                    <br>
                    <br>
                    <h2 class="text-center">Edit Post</h2> 



<?php


        include "configure.php";
        $post_id = $_GET['id'];
        $err = $_GET['id'];

        $err2 = "erorr";
    if($err==$err2){

        echo '<div class="alert alert-danger" role="alert">';
        echo "please make the file less than 3 mb or make the correct file type like (jpg,jpeg,png)";
        echo "</div>";
    }
        
        $query = "SELECT post.post_id, post.post_title, post.image, post.category,post.post_desc, 
        category.category_name FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN users ON post.author = users.id
        WHERE post.post_id = '{$post_id}'";


$result = mysqli_query($connection,$query) or die("Can't Query");
$count = mysqli_num_rows($result);
if($count > 0){
    while($row = mysqli_fetch_assoc($result)){

?>
                            
                            <form action="save_update_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                
                                <input value="<?php echo $row['post_id'] ?>" type="hidden" name="post_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input value="<?php echo $row['post_title'] ?>" name="post_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                <br>
                                <textarea name="post_desc" class="desc form-control"><?php echo $row['post_desc']; ?></textarea>
                            </div>

                            <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Category</label>
                            <select name="category" id="disabledSelect" class="form-select">
                            <option disabled selected>Select Category</option>
                                <?php
                                    include "configure.php";
                                    $querry1 = "SELECT * FROM category";
                                    $result1 = mysqli_query($connection,$querry1) or die("failed!!");
                                    if(mysqli_num_rows($result1) > 0){
                                        while($row1=mysqli_fetch_assoc($result1)){
                                            if($row['category']==$row1['category_id']){
                                                $selected = "selected";
                                            }else{
                                                $selected = "";
                                            }
                                            
                                            echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                        }
                                    }

                                ?>
                            </select>
                            <input type="hidden" name = "old_category" value = "<?php echo $row['category']; ?>">
                            </div>
                            <label for="disabledSelect" class="form-label">Post Image:</label>
                            <br>
                            <input name="new_image" type="file">
                            <br>
                            <img class="custom_image mt-1" src="uploaded_image/<?php echo $row['image']; ?>" alt="">
                            <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
                            <div class="mb-3">
                                
                            </div>
                            
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </form>


                            <?php } 
                            
                        }else{
                            echo "Result Not Found!!";
                        }
                            ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>