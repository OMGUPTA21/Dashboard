<?php
session_start();
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
    <title>Student Reg</title>
    <?php
        include '../link.php';
    ?>
</head>

    <div class="heading">
        <p class="h1 text-warning text-center"><i style="color:blue;">Student Registration<i></p>
    </div>
    <form method="post" action="backend.php">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Student Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Roll No</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" name="roll" placeholder="Roll Number" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Stream</label>
        <div class="col-sm-10">
        <!-- <input type="text" class="form-control" id="inputPassword3" name="stream" placeholder="Stream"> -->
        <?php
            $query = "SELECT * FROM streams";
            $result = mysqli_query($conn,$query);
        ?>
        <select name="stream" class="form-control" placeholder="Select Stream" id="stream" required  onchange="FetchSemester(this.value)"  required>
              <option selected disabled>Select Stream</option>
            <?php
              if (mysqli_num_rows($result) > 0 ) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value='.$row['id'].'>'.$row['stream'].'</option>';
                }
              }
            ?> 
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-10">
        <!-- <input type="text" class="form-control" id="inputPassword3" name="sem" placeholder="Semester"> -->
        <select class="form-control" placeholder="Select Semester" name="sem" id="semester"  onchange="FetchSubject(this.value)"  required>
              <option selected disabled>Select Semester</option>
              
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
        <center><button type="submit" name="student-reg" class="btn btn-primary">Register</button><center>
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
    <script>
        function FetchSemester(id){
            $('#semester').html('<option>Loading Semesters</option>');
            $.ajax({
            type:'post',
            url: 'backend.php',
            data : { stream_id : id},
            success : function(data){
                $('#semester').html(data);
            }

            })
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