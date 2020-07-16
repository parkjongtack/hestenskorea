<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include  $_SERVER['DOCUMENT_ROOT']."/db.php";

$conn = mysqli_connect($host_local,$host_name,$host_pass,$host_db);
$str = "INSERT INTO board (name,title,phone,email,contents,wdate,wdatetime,checkread)
VALUES('$name','$title','$phone','$email','$contents','$wdate','$wdatetime','$checkread');";
$result = mysqli_query($conn,$str);



?>