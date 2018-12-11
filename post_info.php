<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Post</title>
    <?php session_start();?>
  </head>
  <body>
    <?php
      $dbconnection = mysqli_connect("localhost","root","","bulletin");
      $result = mysqli_query($dbconnection, "select * from postings where postId = ". $_GET["id"] ."\n");

      echo "<p>" . mysqli_fetch_assoc($result)["content"] . "</p><br>";

    ?>
  </body>
</html>
