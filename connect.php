<?php
  $dbconnection = mysqli_connect("localhost","root","","bulletin");

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

//  if($result){
//      while($row = mysqli_fetch_assoc($result)){
//          echo "email: " . $row["email"]. " - Name: " . $row["Name"]. " - nickname" . $row["nickname"]. "<br>";
//      }
//  }else{
//      echo "0 results";
//  }

  $dbconnection->close();
?>
