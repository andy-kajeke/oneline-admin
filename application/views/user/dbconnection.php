<?php
//all the variables defined here are accessible in all the files that include this one
$db= new mysqli('localhost','root','','oneline_db')or die("Could not connect to mysql".mysqli_error($db));

//live server
// $db= new mysqli('localhost',
// 'golday_user',
// 'Pa55w0rd12345',
// 'golday_onelineducater')
// or die("Could not connect to mysql".mysqli_error($db));

?>