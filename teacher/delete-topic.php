<?php
require "../connection.php";
$id = $_POST['viewid'];
$sql = "delete from topic where id='$id'";
$query = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($query);
include 'topic.php';
?>