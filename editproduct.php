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

    <title>Edit Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

        <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>

    <SCRIPT TYPE="text/javascript">

    // $(document).ready(function() {

          

          // $("#btn").click(function(){

          //     $.ajax({

          //     url: "editproductphp.php",
          //     type: "POST",
          //     dataType: "text",
              
          //     data:  { //$('#form').serialize(),  //{
          //               Name: $('#Name').val(),
          //    },
          //     success: function(data){
          //         $("input").attr("class","form-control");
          //         $("#btn").attr("id","btn1");
          //           // $("#error").append('<b>'+ data +'</b>');
          //         $.ajax({
          //                   url:"",
          //                   context:document.body,
          //                   success: function(s,x){
          //                       $(this).html(s);
          //                   }
          //               });
          //     },
          //   });
          //       return false;
                
          // });

          // $("#btn1").click(function(){

          //   $.ajax({
              
          //     url: '',
          //     type: 'POST',
          //     dataType: 'text',
          //     data:{}.
          //     success: function(data){
          //       $("#btn1").attr("id","btn");
          //       $("input").attr("class","hidden");
          //       $("input:first").attr("class","form-control");
          //       alert("Fuck You");
          //     }

          //   });
          //     return false;
          // });
          

        // });

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

      <form class="form-signin" action="editproductphp.php" method="post">
        <h2 class="form-signin-heading">Edit Product</h2>

        <input type="text" id="Name" name="ProName" class="form-control" placeholder="Product Name" required autofocus>

        <div class="checkbox">
          <label id="error">
            <b>
              
            </b>
          </label>
        </div>
        <button id="btn" name="submit" value="1" class="btn btn-lg-2 btn-primary pull-left" type="submit">Submit</button>
        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>

      </form>

      

    </div> 

  </body>
</html>
