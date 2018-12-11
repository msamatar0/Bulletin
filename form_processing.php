<?php session_start();
  $uname = $_POST["uname"];
  $pword = $_POST["pword"];

  $dbconnection = mysqli_connect("localhost","root","","bulletin");
  $userQuery = "select `name` from `bbusers` where `NAME` = \"" . $uname . "\"\n";
  $pwordQuery = "select `password` from `bbusers` where `PASSWORD` = \"" . $pword . "\"\n";

  $userResult = mysqli_query($dbconnection, $userQuery);
  $pwordResult = mysqli_query($dbconnection, $pwordQuery);
  if(!$userResult || !$pwordResult){
     die("Database query failed.");
  }

  //values to check if user and pw match
  $ucheck = 0;
  $pwcheck = 0;
  while($row = mysqli_fetch_assoc($userResult)){
    $ucheck = 1;
  }
  while($row = mysqli_fetch_assoc($pwordResult)){
    $pwcheck = 1;
  }

  if($ucheck && $pwcheck){
    echo "success<br>";
    header("Location: bulletin_main.php");
  }
  else{
    echo "failed<br>";
    header("Location: bulletin.php");
  }

  $dbconnection->close();
?>
