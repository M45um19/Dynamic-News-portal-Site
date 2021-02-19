<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Edit User</title>
</head>
<body>


<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("location: index.php");
    }
    if($_SESSION['role']==1){
        header("location: post.php");
    }

?>


                <?php 
                
                    if(isset($_POST['submit'])){

                        include 'configure.php';

                        $id = mysqli_real_escape_string($connection,$_POST['id']);
                        $fname = mysqli_real_escape_string($connection,$_POST['first_name']);
                        $lname = mysqli_real_escape_string($connection,$_POST['last_name']);  
                        $username = mysqli_real_escape_string($connection,$_POST['username']); 
                        $role = mysqli_real_escape_string($connection,$_POST['role']);  
                        $query = "UPDATE users SET id = '{$id}', first_name = '{$fname}', last_name = '{$lname}', username = '{$username}', role = '{$role}' WHERE id = '$id'";
                        $result = mysqli_query($connection,$query) or die("Query Faild");
                        if($result){
                            header("location: users.php");
                        }

                    }
                
                
                ?>
                                <div class="container">
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
                                </div>

                                <br>
                                <br>
                                <br>

                                <h2 class="text-center">Edit User</h2>

            <?php 
            
                $user_id = $_GET['id'];
                include 'configure.php';
                $query = "SELECT * FROM users WHERE id = {$user_id}";
                $result = mysqli_query($connection,$query) or die("Faild");
                $count = mysqli_num_rows($result);

                if($count > 0){
                    while($row = mysqli_fetch_assoc($result)){

            ?>

                



                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="container">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">User ID</label>
                                                    <input value="<?php echo $row['id'] ?>" name="id" type="number" class="form-control" placeholder="ID" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                    <input value="<?php echo $row['first_name'] ?>" name="first_name" type="text" class="form-control" placeholder="Enter First Name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                    <input value="<?php echo $row['last_name'] ?>" name="last_name" type="text" class="form-control" placeholder="Enter Last Name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                                    <input value="<?php echo $row['username'] ?>" name="username" type="text" class="form-control" placeholder="Enter Username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                

                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">Select Role</label>
                                                    <select id="disabledSelect" class="form-select" name="role">

                                                        <?php 
                                                        if($row['role'] == 0){
                                                            echo "<option value='0' selected>Admin</option>";
                                                            echo "<option value='1'>Moderator</option>";
                                                        }else{
                                                            echo "<option value='0'>Admin</option>";
                                                            echo "<option value='1' selected>Moderator</option>";
                                                        }
                                                        
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                
                                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                            </form>

                        <?php 
                                }
                            
                            }
                        ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>