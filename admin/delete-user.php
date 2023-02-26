<?php
require '../connection.php';
$email = $_POST['viewid'];
$sql = "delete from login where email='$email'";
$query = mysqli_query($conn,$sql);

$sql = "delete from teachers where email='$email'";
$query = mysqli_query($conn,$sql);

$sql = "delete from students where email='$email'";
$query = mysqli_query($conn,$sql);

include 'users.php';

?>