<?php


    // session_start();
    // if(!isset($_SESSION["login_user"]))
    // {
    //  header("Location: login.php");
    //  exit();
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

    if(isset($_GET["f"])){
        $f = $_GET["f"];
        $t = $f+5;
    }
    else{
        $f = 0;
        $t = 5;
    }

    if(isset($_POST["submit"])) {
        #echo "Submitted";
        $tbs = $_POST["toSearch"];
        #echo $tbs;
        $query = "SELECT pid, name, description, price, imgAdd FROM products WHERE name LIKE \"%$tbs%\" OR description LIKE \"%$tbs%\" OR cname LIKE \"%$tbs%\" ";
        #$asdf = mysql_query($query);
        
    }
    elseif (isset($_GET["q"])) {
        
        if($_GET["q"]=="Mobile" || $_GET["q"]=="Laptop" || $_GET["q"]=="Tablet"){
            $search = $_GET["q"];
            
            $r = mysql_query("SELECT count(pid) AS c FROM products WHERE category='$search'");
            $rr = mysql_fetch_array($r);
            if($rr[c]>5){ # && isset($_GET["to"])  ){  
                $query = "SELECT pid, name, description, price, imgAdd FROM products WHERE category= '$search'  LIMIT $f,$t";
            }
            else{
                $query = "SELECT pid, name, description, price, imgAdd FROM products WHERE category= '$search'";
            }
        }
        $q = $_GET["q"];
    }
    elseif (isset($_GET["p"])) {
        $p = $_GET["p"];
        $pfrom = 0;
        $pto = 0;

        if($p == 1){
            $pfrom = 0;
            $pto = 5000;
        }
        elseif($p == 2){
                $pfrom = 5001;
                $pto = 10000;
            }elseif($p == 3){
                    $pfrom = 10001;
                    $pto = 15000;
                }elseif($p == 4){
                        $pfrom = 15001;
                        $pto = 20000;
                    }elseif($p == 5){
                            $pfrom = 20001;
                            $pto = 100000000;
                        }
        $r = mysql_query("SELECT count(pid) AS c FROM products WHERE price> '$pfrom' AND price < '$pto'");
        $rr = mysql_fetch_array($r);

        $query = "SELECT pid, name, description, price, imgAdd FROM products WHERE price> '$pfrom' AND price < '$pto' LIMIT $f,$t";

    }
    elseif (isset($_GET["c"])) {
        

    }
        $result = mysql_query($query);
        ?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Search</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    
    $(document).ready(function() {
          $("button[name=addbtn]").click(function(){

              $.ajax({

              url: "cartphp.php",
              type: "POST",
              dataType: "text",
              
              data: { 
                    pid: $(this).siblings("input").val(),
             },
              success: function(data){
                    $.ajax({
                        url:"",
                        context:document.body,
                        success: function(s,x){
                             $(this).html(s);
                        }
                    }); 
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

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $search;?>
                    <small></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <?php ###############################################################################

        if(mysql_num_rows($result)!=0){
            while ($row = mysql_fetch_array($result)) { 
                $id = $row["pid"];
                $name = $row["name"];
                $des = $row["description"];
                $price = $row["price"];
                $img = $row["imgAdd"];
                //echo "\"$img\"";
        ?>
                <div class="row">
                    <div class="col-md-5">
                        <a href="<?php echo "product.php?q=$id"; ?>">
                            <img class="img-responsive" src=<?php echo "\"$img\""; ?> alt="">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <h3><?php echo"$name"; ?></h3>
                        <h4 class="price"><?php echo" Price: $price"; ?><sup>PKR</sup> </h4>
                        <p><?php echo"$des"; ?></p>
                        <a class="btn btn-primary" href="<?php echo "product.php?q=$id"; ?>">See Details</a>
                        <button name="addbtn" class="btn btn-default">Add to Cart</button>
                        <input type="hidden" value="<?php echo "$id";?>">
                    </div>
                </div>
                <!-- /.row -->

                <hr>
        <?php 
            }
        }
        else{
            echo "Sorry! Product(s) Not Found!";
        }
        ?>

        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li> <?php 
                                #$q = $_GET["q"];
                                $pf = 0;
                                if($f>4){
                                    $pf = $f - 5;
                                }
                                if($_GET["q"]){
                               ?>
                                    <a href="<?php echo "products.php?q=$q&f=$pf"; ?>">&laquo;</a>
                                <?php 
                                }
                                elseif($_GET["p"]){?>
                                    <a href="<?php echo "products.php?p=$p&f=$pf"; ?>">&laquo;</a>

                                <?php
                                }
                                ?>
                    </li>


    <?php
        $z = ceil($rr[c]/5);
        $from = 0;
        $to = 5;
        $i = 1;
        $pg = ceil(($t)/5);
        
        while ($i <= $z) {
            
            if($i == $pg){
              ?>
                <li class="active">
                    <?php 
                        if($_GET["q"]){ ?>
                           <a href="<?php echo "products.php?q=$q&f=$from"; ?>"><?php echo "$i";?></a>
                    <?php 
                        }
                        elseif($_GET["p"]){?>
                           <a href="<?php echo "products.php?p=$p&f=$from"; ?>"><?php echo "$i";?></a>

                        <?php
                        }
                     ?>
                </li>
                <?php
            }
            else{
              ?>
                <li>
                    <?php 
                        if($_GET["q"]){ ?>
                           <a href="<?php echo "products.php?q=$q&f=$from"; ?>"><?php echo "$i";?></a>
                    <?php 
                        }
                        elseif($_GET["p"]){?>
                           <a href="<?php echo "products.php?p=$p&f=$from"; ?>"><?php echo "$i";?></a>

                        <?php
                        }
                     ?>
                </li>
            <?php 
            }
            $i++;
            $from += 5;
        }
            
        ?>
                    <li>
                        <?php 
                            if($rr[c]>$t){
                                $ff = $t;
                            }
                            else
                            {
                                $ff = $f;
                            }
                         if($_GET["q"]){
                        ?>
                            <a href="<?php echo "products.php?q=$q&f=$ff"; ?>">&raquo;</a>
                        <?php 
                        }
                        elseif($_GET["p"]){?>
                            <a href="<?php echo "products.php?p=$p&f=$ff"; ?>">&raquo;</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

<?php
    


            ?>
        

        <!-- Pagination -->
        

        

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Reserved 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
