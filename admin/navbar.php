<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require '../connection.php';
if($_SESSION['login'] && $_SESSION['admin']){
    $sql = "select * from login";
    $total_users = mysqli_query($conn,$sql);
    $sql = "select * from students";
    $total_students = mysqli_query($conn,$sql);
    $sql = "select * from teachers";
    $total_teachers = mysqli_query($conn,$sql);
    $sql = "select * from topic";
    $total_topics = mysqli_query($conn,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <?php
        include '../link.php';
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

    <div class="navbar">
        <button class="btn btn-info" id="home" onclick="home();"> <i class="fa-solid fa-house"></i> &nbsp; Home</button>
        <button class="btn btn-secondary" id="topic" onclick="topic();"> <i class="fa-solid fa-note-sticky"></i> &nbsp;Topics : <?php echo mysqli_num_rows($total_topics);?></button>
        <button class="btn btn-primary" id="teacher" onclick="teacher();"> <i class="fa-solid fa-user-tie"></i> &nbsp;Total Teacher : <?php echo mysqli_num_rows($total_teachers);?></button>
        <button class="btn btn-success" id="teacher-reg" onclick="teacher_reg();"> <i class="fa-solid fa-plus"></i> &nbsp;Teacher Registration</button>
        <button class="btn btn-primary" id="teacher" onclick="student();"> <i class="fa-solid fa-user-graduate"></i> &nbsp;Total Student : <?php echo mysqli_num_rows($total_students);?></button>
        <button class="btn btn-success" id="teacher-reg" onclick="student_reg();"> <i class="fa-solid fa-plus"></i> &nbsp;Student Registration</button>
        <a href="../logout.php"><button class="btn btn-danger" >Logout</button></a>
    </div>
    <script type="text/javascript">
        function home(){
            $.ajax({
                url:'users.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
        function teacher(){
            $.ajax({
                url:'teacher.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
        function teacher_reg(){
            $.ajax({
                url:'teacher-reg.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
        function student(){
            $.ajax({
                url:'student.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
        function student_reg(){
            $.ajax({
                url:'student-reg.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
        }
        function topic(){
            $.ajax({
                url:'topic.php',
                type:'post',
                success: function(result){
                    $('#content').html(result);
                }
            });
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