<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
      $dbconnection = mysqli_connect("localhost","root","","bulletin");

      if (mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error());
      }

      $query = "select email, name, password, nickname from bbusers\n";
      $result = mysqli_query($dbconnection, $query);
      if(!$result){
         die("Database query failed.");
      }
    ?>
      <form action="form_processing.php" method="post">
        Username: <input type="text" name="uname" value="" /><br/><br/>
        Password: <input type="password" name="pword" value="" /><br/><br/>
        <br/>
        <input type="submit" name="submit" value"Submit" />
      </form>
    <?php
      /*
      while ($row = mysqli_fetch_assoc($result)){
        echo $row["email"]." ".$row["name"]." ".$row["password"]." ".$row["nickname"]."<br>";
      }
      */

      $dbconnection->close();
    ?>
  </body>
</html>
