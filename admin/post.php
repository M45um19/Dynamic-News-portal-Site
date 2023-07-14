<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Post</title>
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
                        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">post</a>
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
                   
                   
                    <a href="add_post.php?error=<?php echo '101' ?>" type="button" class="btn btn-primary">Add Post</a>
                    
                    <br>
                    <br>



                        <div class="table-responsive">

        
    <?php
        
        include "configure.php";
        $limit = 10;

        if(isset($_GET['page'])){
            $page_num = $_GET['page'];
        }else{
            $page_num = 1;
        }

        
        $offset = ($page_num-1) * $limit;
       
        $query = "SELECT post.post_id, post.post_title, post.post_date,post.category, 
        category.category_name,users.username FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN users ON post.author = users.id
        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($connection,$query) or die("Can't Query");
        $count = mysqli_num_rows($result);
        if($count > 0){

            
    
    
    ?>

                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Post Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

            
<?php 

while($row = mysqli_fetch_assoc($result)){
    


?>
                                    <tr>
                                        <th><?php echo $row['post_id'] ?></th>
                                        <td><?php echo $row['post_title'] ?></td>
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><?php echo $row['post_date'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><a href="edit_post.php?id=<?php echo $row['post_id'] ?>">Edit</a></td>
                                        <td><a href="delete_post.php?id=<?php echo $row['post_id'] ?>&cat=<?php echo $row['category'] ?>">Delete</a></td>
                                    </tr>
         <?php } ?>
                                </tbody>
    
                            </table>
        <?php } ?>
                        </div>

        <?php
        
            include "configure.php";
            $query1 = "SELECT * FROM post";
            $result1 = mysqli_query($connection,$query1) or die("Faild!");
            $count1= mysqli_num_rows($result1);
            if($count1){
                $tota_data = $count1;
                $total_page = ceil($count1/$limit);
                echo "<ul class='pagination justify-content-center'>";
                if($page_num > 1){
                    echo "<li class='page-item'><a class='page-link' href='post.php?page=".($page_num-1)."'>Previous</a></li>";
                }
                for($i = 1; $i <= $total_page; $i++){

                    if($i == $page_num){
                        $active = 'active';
                    }else{
                        $active = '';
                    }

                    echo "<li class='page-item ".$active."'><a class='page-link' href='post.php?page=".$i."'>".$i."</a></li>";

                    
                } 

                if($page_num < $total_page){
                    echo "<li class='page-item'><a class='page-link' href='post.php?page=".($page_num+1)."'>Next</a></li>";
                }

                echo "</ul>";
            }
        
        ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
