<?php
// session_start();
// if(!isset($_SESSION["login_user"]))
// {
//     header("Location: login.php");
//     exit();
// }
    
    if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
    {
        die('Could Not Connect');   
    }

    $ip = $_SERVER['REMOTE_ADDR'];

        $qc = "SELECT count(*) AS C FROM cart WHERE ip = '$ip'";
        $qr = mysql_query($qc);

        $roo = mysql_fetch_array($qr);
        $cc = $roo["C"];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">


</head>

<body>

    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-left" role="search" method="POST" action="products.php">
                            <div class="form-group">
                                <input name="toSearch" type="text" class="form-control" placeholder="Search">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        </form>
                        
                    </li>
                    <li>
                        <a href="index.php">HOME <span class="glyphicon glyphicon-home"></span></a>
                    </li>

                    <li class="dropdown active">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="products.php?q=Mobile">Mobile</a>
                            </li>
                            <li>
                                <a href="products.php?q=Laptop">Laptop</a>
                            </li>
                            <li>
                                <a href="products.php?q=Tablet">Tablets</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Price Range<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="products.php?p=1"><5000</a>
                            </li>
                            <li>
                                <a href="products.php?p=2">5001-10,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=3">10,001-15,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=4">15,001-20,000</a>
                            </li>
                            <li>
                                <a href="products.php?p=5">20,000+</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="cart.php"><span class="badge"><?php echo $cc;?></span> View Cart <span class=" glyphicon glyphicon-shopping-cart"></a>
                    </li>
                    <li>
                        <a href="logout.php">Login <span class=" glyphicon glyphicon-off"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.tapscape.com/wp-content/uploads/2012/12/christmas-tablet-guide.jpeg');"></div>
                <div class="carousel-caption">
                    <h2><b>Tablets</b></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://cdn-static.cnet.co.uk/i/c/blg/cat/mobiles/hd7vsiphonevsdesirehd2.jpg');"></div>
                <div class="carousel-caption">
                    <h2><b>Mobiles</b></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.usedproductsarnhem.nl/files/2014/03/laptops.jpg');"></div>
                <div class="carousel-caption">
                    <h2><b>Laptops</b></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to E-Store
                        <small>Shop here with Ease and Save your Time n Money.</small>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-earphone"></i> Mobile Phones</h4>
                    </div>
                    <div class="panel-body">
                        <p>To buy or explore Mobiles click below</p>
                        <a href="products.php?q=Mobile" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-phone"></i> Tablets</h4>
                    </div>
                    <div class="panel-body">
                        <p>To buy or explore Tablets click below</p>
                        <a href="products.php?q=Tablet" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-apple"></i> Laptops</h4>
                    </div>
                    <div class="panel-body">
                        <p>To buy or explore Laptops click below</p>
                        <a href="products.php?q=Laptop" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
        </div>

        <hr>



        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Resevered 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>

</body>

</html>
