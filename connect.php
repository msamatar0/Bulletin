<?php
  $host = 'aa10qog1gcbw0x2.cpmkzsexhlp4.us-west-1.rds.amazonaws.com'
  $user = 'root'
  $pass = 'password'
  $db_name = 'bulletin'
  $dbconnection = mysqli_connect($host, $user, $pass, $db_name);

  if (mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error());
  }

  $query = "show tables\n";
  $result = mysqli_query($dbconnection, $query);
  if(!$result){
     die("Database query failed.");
  }
  echo $result;
  echo "hi\nno\n";

  $dbconnection->close();
?>
