<?php
$conn = mysqli_connect("www.glaciercentraldata.com","glaciercdata_itams_admin","itams_admin","glaciercdata_itams");
//$conn = mysqli_connect("localhost","root","","itams");

if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
    
  exit();

}
?>