<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <style>
        .ban_img{
    height: 400px;
}
    </style>
    <title>BD News24</title>
</head>
<body class="body_col">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand custom_font" href="#">BD News24</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active custom_font" aria-current="page" href="#">Home</a>
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


    <div class="col1">
        
        <div class="d-grid gap-2 m-4">
    <?php
        
        include "admin/configure.php";
        $query = "SELECT * FROM category ORDER BY category_id ASC";
        $result = mysqli_query($connection,$query) or die("Failed");
        $count = mysqli_num_rows($result);
        if($count > 0){
            while($row = mysqli_fetch_assoc($result)){
            
    
    
    ?>
            <a href="category_wise_post.php?cat_id=<?php echo $row['category_id'] ?>" class="btn custom_cat" type="button"><?php echo $row['category_name'] ?></a>
            <?php 
            }
                }
            ?>
            
        </div>
    </div>

    <div class="col2">

    <?php
        
        include "admin/configure.php";
        $limit = 10;

        if(isset($_GET['page'])){
            $page_num = $_GET['page'];
        }else{
            $page_num = 1;
        }

        
        $offset = ($page_num-1) * $limit;
        
        $query = "SELECT post.post_id, post.post_title, post.post_date,post.category,post.post_desc,post.image,post.author, 
        category.category_name,users.username FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN users ON post.author = users.id
        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        
        $result = mysqli_query($connection,$query) or die("Can't Query");
        $count = mysqli_num_rows($result);
        if($count > 0){

            while($row = mysqli_fetch_assoc($result)){
    
    
    ?>



        <div class="news">
            <div class="news_image">
                <img class="post_image" src="admin/uploaded_image/<?php echo $row['image'] ?>" alt="">
            </div>
            <div class="post_title">
                <h4 class="title custom_font"><?php echo $row['post_title'] ?></h4>
            </div>
            <div class="post_details">
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
            <div class="post_desc">
                <p class="desc_post"><?php echo $row['post_desc'] ?></p>
            </div>
            <div class="read_more d-flex flex-row-reverse m-4">
                <a href="single_post.php?post_id=<?php echo $row['post_id'] ?>" class="btn text-white bg-custom custom_btn custom_font">read more</a>
            </div>
        </div>


        <?php } 
        
            }else{
                echo "<h1 class='text-center'>No News</h1>";
            }

            include "admin/configure.php";
            $query1 = "SELECT * FROM post";
            $result1 = mysqli_query($connection,$query1) or die("Faild!");
            $count1= mysqli_num_rows($result1);
            if($count1){
                $tota_data = $count1;
                $total_page = 5;
                echo "<ul class='pagination justify-content-center'>";
                if($page_num > 1){
                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page_num-1)."'>Previous</a></li>";
                }
                for($i = 1; $i <= $total_page; $i++){

                    if($i == $page_num){
                        $active = 'bg-custom text-white';
                    }else{
                        $active = '';
                    }

                    echo "<li class='page-item'><a class='page-link ".$active."' href='index.php?page=".$i."'>".$i."</a></li>";

                    
                } 

                if($page_num < $total_page){
                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page_num+1)."'>Next</a></li>";
                }

                echo "</ul>";
            }
        
        ?>

            
    </div>
    
    <div class="col3">
    <form action="search.php" method="GET" class="d-flex mt-1 p-3">
        <input name="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn text-white bg-custom custom_font" type="submit">Search</button>
      </form>
    <?php
        
        include "admin/configure.php";
        $query1 = "SELECT * FROM post ORDER BY post_id DESC LIMIT 0,5";
        
        $result1 = mysqli_query($connection,$query1) or die("Can't Query in Recnt");
        $count1 = mysqli_num_rows($result1);
        if($count1 > 0){

            while($row1 = mysqli_fetch_assoc($result1)){
    
    
    ?>

      <div class="recent_p custom_font">
      <a class="custom_a" href="single_post.php?post_id=<?php echo $row1['post_id'] ?>"><?php echo $row1['post_title'] ?></a>
      <hr>
      </div>


      <?php 
            }
        }
      ?>
      
     
      
      
    </div>
    <footer class="bg-dark">
        <p class="text-white text-center">All right reserved by &copy Naim Istiak Masum</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>