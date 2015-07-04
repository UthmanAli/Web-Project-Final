<?php
  include("loginphp.php");

  if(isset($_SESSION["login_user"])){
    if($_SESSION["rank"] == "user")
    {
      header('Location: index.php');
      //exit();
    }
    else if($_SESSION["rank"] == "admin")
    {
      header('Location: adminhome.php');
      //exit();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign In</h2>
        <input name="username" type="text" id="inputusername" class="form-control" placeholder="User Name" required autofocus>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input name="box" type="checkbox" value="remember-me"> Keep me Logged in
          </label>
          <label class="text-danger">
            <b>
              <?php echo "$error"?>
            </b>
        </label>
        </div>
        <button name="submit" class="btn btn-lg btn-primary btn-block btn-default btn-block" type="submit">Sign in</button>
        <div>

        <label class="text-danger">
             <a href="signup.php" class="btn btn-link">Create an Account!</a>
        </label>
        </div>  
        
      </form>

      

    </div> 


  </body>
</html>
