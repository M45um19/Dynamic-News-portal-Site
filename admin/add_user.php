<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Add User</title>
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

                                            <br>
                                            <br>
                                            
                                            <br>

                <?php 
                
                    if(isset($_POST['submit'])){

                        include 'configure.php';

                        $fname = mysqli_real_escape_string($connection,$_POST['first_name']);
                        $lname = mysqli_real_escape_string($connection,$_POST['last_name']);  
                        $username = mysqli_real_escape_string($connection,$_POST['username']); 
                        $password = mysqli_real_escape_string($connection,md5($_POST['password'])); 
                        $role = mysqli_real_escape_string($connection,$_POST['role']);  

                        $query = "SELECT username FROM users WHERE username='$username'";
                        $result = mysqli_query($connection,$query) or die("Query Faild");

                        $count = mysqli_num_rows($result);
                        if($count > 0){
                            echo "Username already Exist";
                        }else{
                            $query1 = "INSERT INTO users (first_name,last_name,username,password,role)
                            VALUES ('$fname','$lname','$username','$password','$role')";
                            $result2 = mysqli_query($connection,$query1) or die("Query Faild2");
                        }

                        if($result2){
                            header("location: users.php");
                        }


                    }

                
                
                ?>
                                            <h2 class="text-center">Add User</h2>
                        
                                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="container">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                    <input name="first_name" type="text" class="form-control" placeholder="Enter First Name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                    <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                                    <input name="username" type="text" class="form-control" placeholder="Enter Username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                    
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="disabledSelect" class="form-label">Select Role</label>
                                                    <select id="disabledSelect" class="form-select" name="role">
                                                        <option value="0">Admin</option>
                                                        <option value="1">Moderator</option>
                                                    </select>
                                                </div>
                                                
                                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                            </div>   
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>