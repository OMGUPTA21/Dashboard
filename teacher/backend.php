<?php
include '../connection.php';
if(isset($_POST['submit'])){
    session_start();
    $faculty = $_SESSION['user']['name'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $link = $_POST['link'];
    $x=count($_FILES['filelink']['name']);
    $filepath="";
    for($i=0;$i<$x;$i++){
        $temp=$_FILES['filelink']['tmp_name'][$i];
        $url = "../Topic/";
        $var=$_FILES['filelink']['name'][$i];
        $furl = $url.$var;
        $filepath=$filepath.$furl.',';
        move_uploaded_file($_FILES['filelink']['tmp_name'][$i],$furl);
        $temp='';
        // echo $temp.' '.$furl.' '.$filepath.'<br>';
    }
    $sql = "INSERT INTO `topic`(`name`, `faculty`, `detail`, `link`, `file`) VALUES ('$name','$faculty','$detail','$link','$filepath')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Topic Added");
        history.back();</script>';
    }else{
        echo '<script>alert("Error occured");
        history.back();</script>';
    }
    // header('location:index.php');
}
?>