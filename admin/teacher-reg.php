<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['admin']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Reg</title>
    <?php
        include '../link.php';
    ?>
</head>
<body>
    <div class="heading">
        <p class="h1 text-warning text-center"><i style="color:blue;">Teacher Registration</i></p>
    </div>
    <form method="post" action="backend.php">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Teacher Name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Designation</label>
            <div class="col-sm-10">
            <!-- <input type="text" class="form-control" id="inputPassword3" name="designation" placeholder="Write designation" required> -->
            <select class="form-control" placeholder="Select Designation" name="designation"  required>
              <option selected disabled>Select Designation</option>
              <option value="Faculty">Faculty(MCA)</option>
              <option value="Director ">Director</option>
              <option value="Vice chancellor">Vice Chancellor</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="dob" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" required>
            <input type="checkbox" onclick="myFunction()"> &nbsp; Show Password
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
            <center><button type="submit" class="btn btn-primary" name="teacher-reg">Register</button></center>
            </div>
        </div>
    </form>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
<?php
}
else{
    header('location:../index.php');
}


?>