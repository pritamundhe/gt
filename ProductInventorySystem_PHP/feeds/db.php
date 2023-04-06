
<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "ladyjoy_fs";

$con = mysqli_connect($host, $user, $pwd, $db);
if(mysqli_connect_errno()){
  die("Could not connect: ".mysqli_connect_error());
}

?>