<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .formm{
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }
        h1,h3{
            color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        }
    </style>
    <title>Log in</title>
</head>
<body>

<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("location: post.php");
    }


?>
                            <br>
                            <br>
                            <div class="container">
                            
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                
                                </div>
                                <div class="col-sm formm">
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" >
                            <div class="mb-3">
                            <h1 class="text-center mt-3">Best News24</h1>
                            <h3 class="text-center">Admin Panel</h3>
                                <label for="exampleInputEmail1" class="form-label mt-4">Username</label>
                                <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <?php

                                if(isset($_POST['submit'])){
                                    include "configure.php";
                                    $username = mysqli_real_escape_string($connection,$_POST['username']);
                                    $password = md5($_POST['password']);
                                $query = "SELECT id,username,role FROM users WHERE username='{$username}' AND password = '{$password}'";
                                $result = mysqli_query($connection,$query) or die("Query Faild");
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        session_start();

                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['id'] = $row['id'];
                                        $_SESSION['role'] = $row['role'];
                                        header("location: post.php");
                                    }

                                }else{
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo "Username or Password don't match";
                                    echo "</div>";
                                }
                            }

                            ?>
                            <button name="submit" type="submit" class="btn btn-primary mb-5">Submit</button>
                            </form>

                            
                                </div>
                                <div class="col-sm">
                                
                                </div>
                            </div>
                            </div>
</body>
</html>