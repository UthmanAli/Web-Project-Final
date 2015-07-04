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

    <title>Add Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

        <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>

    <SCRIPT TYPE="text/javascript">

    $(document).ready(function() {
          $("#btn").click(function(){
           
              $.ajax({

              url: "addproductphp.php",
              type: "POST",
              dataType: "text",
              
              data:  { //$('#form').serialize(),  //{
                        name: $('#name').val(),
                        companyname: $('#cname').val(),
                        category: $('#cate').val(),
                        description: $('#des').val(),
                        price: $('#price').val(),
                        cost: $('#cost').val(),
                        units: $('#units').val(),
                        imgadd: $('#imgadd').val(),
                        supplier: $('#sup').val(),

             },
              success: function(data){
                     if(data=="Success"){
                        $("#error").addClass("text-success");
                     }
                     else{
                        $("#error").addClass("text-danger");
                     }
                     $("b").remove();
                     $("#error").append('<b>'+ data +'</b>');
              },
              
              // error: function(){
              //   alert("Some thing went wrong!");
              // },
            });
                return false;
                
          });
        });

    </SCRIPT>

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

      <form class="form-signin" action="addproduct.php" method="post">
        <h2 class="form-signin-heading">Add Product</h2>

        <input name="name" type="text" id="name" class="form-control" placeholder="Product Name" required autofocus>

        <input name="companyname" type="text" id="cname" class="form-control" placeholder="Company Name" required >

        <input name="category" type="text" id="cate" class="form-control" placeholder="Category" required >
        
        <input name="description" type="text" id="des" class="form-control" placeholder="Description" required>

        <input name="price" type="text" id="price" class="form-control" placeholder="Price" required>

        <input name="cost" type="text" id="cost" class="form-control" placeholder="Cost" required>

        <input name="units" type="text" id="units" class="form-control" placeholder="Units" required>
        
        <input name="imgadd" type="text" id="imgadd" class="form-control" placeholder="Image Address" required >

        <input name="supplier" type="text" id="sup" class="form-control" placeholder="Supplier Address" required >

        <div class="checkbox">
          <label id="error">
            <b>
              
            </b>
          </label>
        </div>
        <button id="btn" name="submit" value="1" class="btn btn-lg-2 btn-primary pull-left" type="button">Submit</button>
        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>
        <div>

        </div>  
        
      </form>

      

    </div> 


  </body>
</html>
