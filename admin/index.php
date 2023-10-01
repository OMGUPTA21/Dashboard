<?php
session_start();
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['admin']){
    $sql = "select * from students";
    $total_students = mysqli_query($conn,$sql);
    $sql = "select * from teachers";
    $total_teachers = mysqli_query($conn,$sql);
    $sql = "select * from topic";
    $total_topics = mysqli_query($conn,$sql);
    
?>
    //please clear response...

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log Portal</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="icon" type="image/x-icon" href="../images/dashboard.jpg">
    <?php
        include '../link.php';
    ?>
    

</head>
<style>
    .hero{

background-image: url("admin.png");

/* The image used */
background-color: #fdebeb;
/* Used if the image is unavailable */

/* You must set a specified height */
background-position: center;
/* Center the image */
background-repeat: no-repeat;
/* Do not repeat the image */
background-size: cover;
/* Resize the background image to cover the entire container */



}

table th {
    padding-top: 6px;
    padding-bottom: 6px;
    text-align: left;
    background-color: #007bff;
    color: white;
}

table tr{
    color: green;
    text-align:left;

}
</style>
<body class="hero">
    <?php
        include 'navbar.php';
    ?>
    <div class="container" id="content">
        <?php
            include 'users.php';
        ?>
    </div>
  
</body>
</html>
<?php
}
else{
    header('location:../index.php');
}


?>
