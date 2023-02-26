<?php
require 'connection.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$q = "SELECT * FROM `login` WHERE email = '$email' and password = '$password'";
$query = mysqli_query($conn, $q);

$_SESSION['admin'] = false;
$_SESSION['teacher'] = false;
$_SESSION['student'] = false;
$_SESSION['login'] = $email;
$_SESSION['user'] = $email;

if(mysqli_num_rows($query) > 0){
    $_SESSION['login'] = true;
    $_SESSION['user'] = true;
    while($row = mysqli_fetch_array($query)){
        $role = $row['role'];
    }
    if($role == "admin"){
        $_SESSION['admin'] = true;
        header("location:admin/index.php");
    }
    elseif($role == "teacher"){
        $_SESSION['teacher'] = true;
        $_SESSION['teacher'] = true;
        $q = "SELECT * FROM `teachers` WHERE email = '$email' and password = '$password'";
        $query=mysqli_query($conn,$q);
        $res=mysqli_fetch_array($query);
        $_SESSION['user'] = $res;
        header("location:teacher/index.php");
    }
    elseif($role == "student"){
        $_SESSION['student'] = true;
        $q = "SELECT * FROM `students` WHERE email = '$email' and password = '$password'";
        $query=mysqli_query($conn,$q);
        $res=mysqli_fetch_array($query);
        $_SESSION['user'] = $res;
        header("location:student/index.php");
    }
    
}
else{
    echo '<script> alert("Invalid Credentials");
    history.back();
     </script>';
}



?>