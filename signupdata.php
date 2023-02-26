<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satus</title>
</head>
<style>
h1
{
    color:blue;
}
.hero{

background-image: url("admin/admin.png");

/* The image used */
/*background-color: #fdebeb;*/
/* Used if the image is unavailable */

/* You must set a specified height */
background-position: center;
/* Center the image */
background-repeat: no-repeat;
/* Do not repeat the image */
background-size: cover;
/* Resize the background image to cover the entire container */
}
</style>
<body class="hero">
    
<nav>
    <a href="signup.php">Back</a>
</nav>
    <?php
require 'connection.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword= $_POST['cpassword'];
$role= $_POST['role'];
$exists = false;

if(($password == $cpassword)&& $exists==false){




$_SESSION['login'] = $email;
$_SESSION['user'] = $email;



$sql_e = "SELECT `email` FROM `login` WHERE email = '$email' and password = '$password'";
$res_e = mysqli_query($conn, $sql_e);
if(mysqli_num_rows($res_e) > 0){
    $_SESSION['login'] = true;
    $_SESSION['user'] = true;
    while($row = mysqli_fetch_array($res_e)){
        
        echo "<center><h1>ACCOUNT ALREADY EXITS</h1></center>";
}
}

else{
  $sql_e= "INSERT INTO `login` (`email`, `password`, `role`) VALUES ('$email', '$password', '$role');";
  $result = mysqli_query($conn, $sql_e);
  if($result){
      echo "<center><h1>PROFILE CREATED !<h1><center>";
      }

        else{
          "<center><h1>Login failed. Invalid username or password.</h1><center>";
        }
        }
       
      }

   


?>
    
</body>
</html>