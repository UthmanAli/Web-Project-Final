<?php
session_start();
    //include_once("addproductphp.php");

      if(!isset($_SESSION["login_user"]))
      {
        header("Location: login.php");
        exit();
      }

      if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
      {
          die('Could Not Connect');   
      }
      if(empty($_POST['ProName'])){
        echo "Please Go Back and Enter the Name of Product.";
      }
      else{
      $nme = $_POST["ProName"];
      $qc = "SELECT * FROM products WHERE name = '$nme' LIMIT 1";
      $qr = mysql_query($qc);

      if(mysql_num_rows($qr)>0){

      $roo = mysql_fetch_array($qr);
      $id = $roo["pid"];
      $name = $roo["name"];
      $cname = $roo["cname"];
      $cate = $roo["category"];
      $des = $roo["description"];
      $price = $roo["price"];
      $cost = $roo["cost"];
      $units = $roo["units"];
      $imgadd = $roo["imgAdd"];
      $sup = $roo["supplier"];

      }
      else
        echo "Prodcut Don't Exist";
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

    $(document).ready(function() {

          

          $("#btn").click(function(){

              $.ajax({

              url: "update.php",
              type: "POST",
              dataType: "text",
              
              data:  { 
                  id: $('#id').val(),
                  name: $('#Name').val(),
                  cname: $('#cname').val(),
                  des: $('#des').val(),
                  cate: $('#cate').val(),
                  price: $('#price').val(),
                  cost: $('#cost').val(),
                  units: $('#units').val(),
                  imgadd: $('#imgadd').val(),
                  sup: $('#sup').val(),

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
            });
                return false;
                
          });

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

      <form class="form-signin" action="update.php" method="post">
        <h2 class="form-signin-heading">Edit Product</h2>

        <input type="text" id="id" class="hidden" value="<?php echo $id?>">

        <input type="text" id="Name" class="form-control" placeholder="Product Name" value="<?php echo $name?>" required autofocus>

        <input name="companyname" type="text" id="cname" class="form-control" placeholder="Company Name" value="<?php echo $cname?>" required >

        <input name="category" type="text" id="cate" class="form-control" placeholder="Category" value="<?php echo $cate?>" required >
        
        <input name="description" type="textblock" id="des" class="form-control" placeholder="Description" value="<?php echo $des?>" required>

        <input name="price" type="text" id="price" class="form-control" placeholder="Price" value="<?php echo $price?>" required>

        <input name="cost" type="text" id="cost" class="form-control" placeholder="Cost" value="<?php echo $cost?>" required>

        <input name="units" type="text" id="units" class="form-control" placeholder="Units" value="<?php echo $units?>" required>
        
        <input name="imgadd" type="text" id="imgadd" class="form-control" placeholder="Image Address" value="<?php echo $imgadd?>" required >

        <input name="supplier" type="text" id="sup" class="form-control" placeholder="Supplier Address" value="<?php echo $sup?>" required >

        <div class="checkbox">
          <label id="error">
            <b>
              
            </b>
          </label>
        </div>
        <button id="btn" name="submit" value="1" class="btn btn-lg-2 btn-primary pull-left" type="button">Submit</button>
        <button name="reset" class="btn btn-lg-2 btn-default pull-left" type="reset">Re-set</button>

      </form>

      

    </div> 

  </body>
</html>
