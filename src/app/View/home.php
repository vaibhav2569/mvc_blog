<?php
session_start();
include_once '../assets/variables.php';
include_once BASE_PATH . '/assets/db/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../public/css/style.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
    <title>my store</title>
  

</head>
<body>
      <!-- navbar starts -->
      <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
           <h1 style="color:#ffd333;">Blog website</h1>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="home.php" class="nav-item nav-link active">Home</a>                           
                         
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                          
                           
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-plus text-primary"> Create blog</i>
                            </a>
                            <a href="signup.php" class="btn px-0 ml-3 signup">
                                <i class="fas fa-user-alt text-primary "> 
                                <?php if(empty($_SESSION['user'])){echo "Sign up";} else{ echo " Log out";} ?>
                               </i>
                            </a>
                           

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- display blog -->
    <div class="container-fluid pt-5 pb-3">
      <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Blogs</span></h2>
      
    <div class="row px-xl-5">
        <!-- dynamically adding products from DB -->
    <?php
        $blog= new Blog();
        $result=$blog->find('all');
       
        foreach($result as $key=>$val)
        {
            $b_id=$result[$key]->blog_id;
            $title=$result[$key]->title;
            $image=$result[$key]->image;
            $likes=$result[$key]->likes;
            $u_id=$result[$key]->u_id;
        
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
       
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="../../public/img/<?php echo $image?>" alt="image" style="height: 400px;">
                        <div class="product-action"> 
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h3><?php echo $title?></h3>
                        </div>
                        <a class="h6 text-decoration-none text-truncate" href="blog_desc.php?id=<?php echo $b_id?>">View Blog</a>
                       
                        
                        <form action="" method="post">
                            <input type="hidden" name="hidden-id" value="<?php echo $b_id?>">
                        <button class="btn "><i class="fa fa-heart text-primary " ></i> <?php echo $likes?> Likes</button>
                        </form>
                     
                      
                    </div>
                </div>
            </div>
            <?php
        
    }
    ?>
    </div>
    
   
</div>

</body>