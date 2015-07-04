<?php
session_start();
    //include_once("addproductphp.php");

      if(!isset($_SESSION["login_user"]))
      {
        header("Location: login.php");
        exit();
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

        <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
    
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
                <a class="navbar-brand" href="adminhome.php">E-Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="adminhome.php">HOME <span class="glyphicon glyphicon-home"></span></a>
                    </li>
                    <li>
                        <a href="logout.php">Logout <span class=" glyphicon glyphicon-off"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

     <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to E-Store
                        <small>Admin Panel.</small>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-plus-sign"></i> Add Product</h4>
                    </div>
                    <div class="panel-body">
                        <p>To Add a Product Click below</p>
                        <a href="addproduct.php" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
                    </div>
                    <div class="panel-body">
                        <p>To Delete a Product Click below</p>
                        <a href="removeproduct.php" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="glyphicon glyphicon-pencil"></i> Edit Product</h4>
                    </div>
                    <div class="panel-body">
                        <p>To Update a product Click below</p>
                        <a href="editproduct.php" class="btn btn-default">Click Here</a>
                    </div>
                </div>
            </div>
        </div>

      


  </body>
</html>
