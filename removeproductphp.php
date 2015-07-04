<?php

  if (empty($_POST['Name'])) {
    echo "Fill the Filed!"; 
  }
  else{
    if(!mysql_connect('localhost','root','')||!mysql_select_db('store'))
    {
        die('Could Not Connect'); 
    }
    $nam = $_POST['Name'];

    $q = "SELECT count(*) AS c FROM products WHERE name = '$nam'";
    $query = mysql_query($q);

    $row = mysql_fetch_array($query);
    if( $row["c"]>0){

      $q = "DELETE FROM products WHERE name = '$nam' LIMIT 1";
      $query = mysql_query($q);
      if($query){
        echo "Success";
      }
      else{
        echo "Query Did't Run";
      }
    }
    else{
      echo "Product Don't Exist";
    }
  }

?>
