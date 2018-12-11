<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bulletin Board</title>
    <?php session_start();?>
  </head>
  <body>
    <?php
      $dbconnection = mysqli_connect("localhost","root","","bulletin");
      $result = mysqli_query($dbconnection, "select * from postings\n");

      $i = 1;
      echo "<ul></br>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<li>" . "<a href=\"post_info.php?id=". $row["postId"] ."\">"
          . $row["postSubject"] . "</a> " . $row["postDate"] . "</li></br>";
      }
      echo "</ul></br></br><hr>";
    ?>
    <h1><?php echo "Welcome, " . $_SESSION["uname"] . "!";?></h1>
    <form action="message_enter.php" method="post">
        Subject: <input type="text" name="subject" value=""/><br/><br/>
        Message: <br/><textarea name="msgbox" rows="7" cols="50"/></textarea><br/>
        <br/><input type="submit" name="submit" value="Enter"/>
    </form>
  </body>
</html>
