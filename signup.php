<?php
  //include("signupphp.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    
    $(document).ready(function() {
          $("#btn").click(function(){
           
              $.ajax({

              url: "signupphp.php",
              type: "POST",
              dataType: "text",
              
              data:  { //$('#form').serialize(),  //{
                        name: $('#name').val(),
                        username: $('#uname').val(),
                        password: $('#password').val(),
                        confirm: $('#confirm').val(),
                        age: $('#age').val(),
                        gender: $('#optionsRadios1').val(),
                        city: $('#city').val(),
                        state: $('#state').val(),

             },
              success: function(data){
                     if(data=="Success"){
                        $("#error").addClass("text-success");
                     }
                     else{
                        $("#error").addClass("text-danger");
                     }
                     $("b").remove();
                     $("#error").append('<b>'+data+'</b>');
              },
              
              // error: function(){
              //   alert("Some thing went wrong!");
              // },
            });
                return false;
                
          });
        });
          
  </script>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Price Range<b class="caret"></b></a>
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
                        <a href="cart.php">View Cart <span class=" glyphicon glyphicon-shopping-cart"></span></a>
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

    <div class="container">

      <form id="form" class="form-signin" method="post" action="signupphp.php">
        <h2 class="form-signin-heading">Sign Up</h2>

        <input name="name" type="text" id="name" class="form-control" placeholder="Full Name" required autofocus>

        <input name="username" type="text" id="uname" class="form-control" placeholder="User Name" required >

        <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        
        <input name="confirm" type="password" id="confirm" class="form-control" placeholder="Confirm Password" required >
        
        <label class="col-lg-2 control-label">Gender</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input name="gender" id="optionsRadios1" value="male" checked="" type="radio">
            Male
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="gender" id="optionsRadios1" value="female" type="radio">
            Female
          </label>
        </div>
      </div>

        <input name="age" type="text" id="age" class="form-control" placeholder="Age" maxlength="2" required >
        
        <input name="city" type="text" id="city" class="form-control" placeholder="City" required>

        <input name="state" type="text" id="state" class="form-control" placeholder="State" required>
        
        <div class="checkbox">
          <label id="error">
            <b>
                
            </b>
          </label>
        </div>
        <button id="btn" name="submit" class="btn btn-lg-2 btn-primary pull-left" type="button">SignUp</button>

        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>
        <div>

        </div>  
        
      </form>

      

    </div> 


  </body>
</html>
