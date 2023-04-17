
<?php
error_reporting(0);
session_start();
include_once '../assets/variables.php';
include_once BASE_PATH . '/assets/db/config.php';
$id=$_GET['id'];
$blog= new Blog();
$result=$blog->find('all');

foreach($result as $key=>$val)
{
    if($id == $result[$key]->blog_id)
    {
        $title=$result[$key]->title;
        $image=$result[$key]->image;
        $desc=$result[$key]->blog_desc;
    }
  
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $change = Blog::find($id);
   $new_desc=$_POST['description'];
   $change->blog_desc = $new_desc;
   $change->save();
}
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
<!-- des -->
<div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel" >
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active" style="height:600px;">
                            <img class="w-100 h-100" src="../../public/img/<?php echo $image?>" alt="Image" style="height: 50px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $title ?></h3>
                    <form action="" method="post">
                  <textarea name="description" id="" cols="80" rows="15">
                  <?php echo $desc ?>
                  </textarea>
                    
                  
                    <div class="d-flex align-items-center mb-4 pt-2">
                       
                            <button class="btn btn-primary px-3"><i class="fa fa-edit mr-1"></i> Edit Blog
                            </button>
                        </form>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>