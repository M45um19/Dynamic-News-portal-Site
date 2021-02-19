<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Category</title>
</head>
<body class="container">

<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
    if($_SESSION['role']==1){
        header("location: post.php");
    }
}

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <a class="navbar-brand text-white" href="#">Best News24</a>
                        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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


                    <a href="add_category.php" type="button" class="btn btn-primary">Add Category</a>
                    <br>
                    <br>


        <?php
        
        include "configure.php";
        

        
       

        $query = "SELECT * FROM category ORDER BY category_id ASC";
        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result);
        if($count > 0){

            
    
    
    ?>





                    <div class="table-responsive">  
                    <table class="table caption-top">
                    
                    <thead class="bg-primary text-white">
                        <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Number of Post</th>
                        
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php 

while($row = mysqli_fetch_assoc($result)){
    


?>


                    <tr>
                    <th scope="row"><?php echo $row['category_id'] ?></th>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['number_of_post'] ?></td>
                    <td><a href="edit_category.php?id=<?php echo $row['category_id'] ?>">Edit</a></td>
                    <td><a href="delete_category.php?id=<?php echo $row['category_id'] ?>">Delete</a></td>
                    </tr>

                    <?php } ?>
                    </tbody>
                    <?php } ?>
                    </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>