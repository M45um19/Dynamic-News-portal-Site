<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>single post</title>
</head>
<body class="body_col">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand custom_font" href="index.php">BD News24</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active custom_font" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active custom_font" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active custom_font" href="#">Conatct</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active custom_font" href="#">About Us</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>


<div class="container">


    <div class="container_custom sinlge_post_shadow">
    <?php
        
        include "admin/configure.php";
       
        $post_id_single = $_GET['post_id'];
       
        
        $query = "SELECT post.post_id, post.post_title, post.post_date,post.category,post.post_desc,post.image,post.author, 
        category.category_name,users.username FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN users ON post.author = users.id
        WHERE post_id = '{$post_id_single}'";
        
        $result = mysqli_query($connection,$query) or die("Can't Query");
        $count = mysqli_num_rows($result);
        if($count > 0){

            while($row = mysqli_fetch_assoc($result)){
    
    
    ?>
        <img class="single_post_image mt-4 pt-4" src="admin/uploaded_image/<?php echo $row['image'] ?>" alt="">
        <div class="post_details justify-content-center m-4">
                <div class="">
                    <i class="fas fa-tags custom-icon"></i>
                    <a class="custom_link" href="category_wise_post.php?cat_id=<?php echo $row['category'] ?>"><?php echo $row['category_name'] ?></a>
                </div>
                <div class="details">
                <i class="fas fa-user custom-icon"></i>
                    <a class="custom_link" href="author_wise_post.php?author=<?php echo $row['author'] ?>"><?php echo $row['username'] ?></a>
                </div>
                <div class="details">
                <i class="fas fa-table custom-icon"></i>
                    <a class="custom_link" href=""><?php echo $row['post_date'] ?></a>
                </div>
        </div>
        <div>
            <h3 class="text-center"><?php echo $row['post_title'] ?></h3>
            <p class="pb-4 p-4"><?php echo $row['post_desc'] ?></p>
        </div>
        <?php 
            }
        }
        ?>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>