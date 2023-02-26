<?php
include '../connection.php';
if (isset($_POST['stream_id'])) {
	$query = "SELECT * FROM semesters where streams_id=".$_POST['stream_id'];
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0 ) {
			echo '<option selected disabled>Select Semester</option>';
		 while ($row = mysqli_fetch_assoc($result)) {
		 	echo '<option value='.$row['id'].'>'.$row['sem'].'</option>';
		 }
	}else{

		echo '<option>No Semester Found!</option>';
	}

}
else{
    if(isset($_POST['student-reg'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $stream = $_POST['stream'];
    $sem = $_POST['sem'];
    if($stream==1)
        $stream="MCA";
    else if($stream==2)
        $stream="MCA";
    else if($stream==3)
        $stream="MCA";
    else if($stream==4)
        $stream="MCA";
   


    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "select * from login where email='$email'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        echo '<script>alert("User Already Exists");
        history.back();
        </script>';
        // header('location:index.php');
    }
    $sql = "INSERT INTO `students`( `name`, `roll`, `stream`, `sem`, `dob`, `email`, `phone`, `password`) VALUES ('$name','$roll','$stream','$sem','$dob','$email','$phone','$password')";
    $query = mysqli_query($conn,$sql);
    $sql = "INSERT INTO `login`(`email`, `password`, `role`) VALUES ('$email','$password','student')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Student Registered");</script>';
    }else{
        echo '<script>alert("Error occured");</script>';
    }
}
else 
if(isset($_POST['teacher-reg'])){
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "select * from login where email='$email'";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        echo '<script>alert("User Already Exists");</script>';
        echo '<script>history.back();</script>';
    }
    $sql = "INSERT INTO `teachers`( `name`, `designation`, `dob`, `email`, `phone`, `password`) VALUES ('$name','$designation','$dob','$email','$phone','$password')";
    $query = mysqli_query($conn,$sql);
    $sql = "INSERT INTO `login`(`email`, `password`, `role`) VALUES ('$email','$password','teacher')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Teacher Registered");</script>';
    }else{
        echo '<script>alert("Error occured");</script>';
    }
}

echo '<script>history.back();</script>';
}

// header('Refresh: 2; URL=index.php');
// header('location:index.php');




?>