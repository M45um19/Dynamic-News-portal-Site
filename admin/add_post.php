<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .desc{
            height: 200px;
        }
    </style>
</head>
<body class="container">

<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("location: index.php");
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
                    <h2 class="text-center">Add Post</h2>   

<?php
    $err = $_GET['error'];
    if($err==100){

        echo '<div class="alert alert-danger" role="alert">';
        echo "please make the file less than 3 mb or make the correct file type like (jpg,jpeg,png)";
        echo "</div>";
    }

    

?>

                    <br>
                    <br>




                        <form action="save_post.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input name="post_title" placeholder="Write a Title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                           
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID</label>
                            <input name="post_id" placeholder="Write a post id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                           
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="post_desc" placeholder="Write Something..." type="text" class="form-control desc" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Category</label>
                            <div class="mb-3">
                                
                                <select name="category" id="disabledSelect" class="form-select">
                                <option disabled selected>Select Category</option>
                                <?php
                                    include "configure.php";
                                    $querry = "SELECT * FROM category";
                                    $result = mysqli_query($connection,$querry) or die("failed!!");
                                    if(mysqli_num_rows($result) > 0){
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                        }
                                    }

                                ?>
                                    
                                    
                                </select>
                                </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Post Image</label>
                            <br>
                            <input name="post_image" type="file" required>
                        </div>
                        
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>



                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html>