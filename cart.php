<?php 

        $ip = $_SERVER['REMOTE_ADDR'];

        if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
        {
            die('Could Not Connect');   
        }
        $qc = "SELECT count(*) AS C FROM cart WHERE ip = '$ip'";
        $qr = mysql_query($qc);

        $roo = mysql_fetch_array($qr);
        $cc = $roo["C"];

        
        $query = "SELECT proid, name, price, price*qty AS sub, qty 
                  FROM products, cart 
                  WHERE pid = proid AND ip = '$ip'";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==0){
            echo "Your Cart is Empty";
        }
        else{
        ?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Shopping Cart</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script TYPE="text/javascript">
        $(document).ready(function(){
            $(".close").click(function(){

              $.ajax({

              url: "cartdelete.php",
              type: "POST",
              dataType: "text",
              
              data: { 
                    pid: $(this).siblings('input').val(),
             },
              success: function(data){
                    if(data == "Success"){
                        // alert(data);
                        //$(this).parent().parent().addClass("hidden");
                        $.ajax({
                            url:"",
                            context:document.body,
                            success: function(s,x){
                                $(this).html(s);
                            }
                        });
                    }

              },
              
              // error: function(){
              //   alert("Some thing went wrong!");
              // },
            });
                return false;
                //alert($(this).siblings('input').val());

                
            });
            //alert($("input#hdn").val()); 
        });
    </script>

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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                        Your Cart
                </h1>
            </div>
        </div>
        <!-- /.row -->
        




        <table class="table table-hover ">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Sub total</th>
            </tr>
          </thead>
          <tbody>

        <?php 
        $total = 0;
        $i = 1;
            while ($row = mysql_fetch_array($result)) {
                $p = $row["proid"];
                $name = $row["name"];
                $price = $row["price"];          
                $sub = $row["sub"];
                $quantity = $row["qty"];

        ?>
            <tr >
             
              <td><?php echo $i;?></td>
              <td><?php echo $name;?></td>
              <td><?php echo $price;?></td>
              <td><?php echo $quantity;?></td>
              <td><?php echo $sub;?>
                <button id="" type="button" class="close" data-dismiss="alert">×</button>
                <input type="hidden" value="<?php echo $p;?>">
              </td>
              

            </tr>
        <?php 
            $i++;
            $total += $sub;
            }
        ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><h4>Total Amount</h4></td>
              <td><h4><?php echo $total;?><sup>PKR</sup></h4></td>
            </tr>
          </tbody>
        </table> 

        <?php 
        }
        ?>

        <button class="btn btn-primary">Check Out</button>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Reserved 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
