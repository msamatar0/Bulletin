<?php session_start();
  $subj = $_POST["subject"];
  $msg = $_POST["msgbox"];
  $max = 0;
  $dbconnection = mysqli_connect("localhost","root","","bulletin");

  if (mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error());
    header("Location: bulletin_main.php");
  }

  $query = "select max(postId) as maxId from postings";
  $result = mysqli_query($dbconnection, $query);
  while ($row = mysqli_fetch_assoc($result)){
    $max = $row["maxId"];
  }
  $max = $max + 1;

  $query = $query = "insert into postings(postDate,postedBy,postSubject,content,ancestorPath) values(".
    "now(),\"" . $_SESSION["uname"] . "\",\"" . $subj . "\",\"" . $msg . "\"," . $max . ")\n";
  $result = mysqli_query($dbconnection, $query);
  if(!$result){
    echo $_SESSION["uname"] . "<br>" . $subj . "<br>" . $msg . "<br>" . $max . "<br>";
    die("Database query failed.");
    header("Location: bulletin_main.php");
  }
  else{
    header("Location: bulletin_main.php");
  }
  #UPDATE postings set ancestorPath = (SELECT postId from postings where postId = 2) a where postId = 2
  $dbconnection->close();
?>
