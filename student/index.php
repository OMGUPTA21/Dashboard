<?php
session_start();
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['student']){
    $sql = "select * from topic";
    $total_topics = mysqli_query($conn,$sql);
    
?>
<!--student section Page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../student/style.css">
    <link rel="icon" type="image/x-icon" href="../images/dashboard.jpg">
    <?php
        include '../link.php';
    ?>
    <style>
        .container{
            /* border: 2px solid red; */
            width: 50%;
        }
        @media only screen and (max-width: 800px) {
            .container{
                width: 60%;
            }
        }
        @media only screen and (max-width: 700px) {
            .container{
                width: 70%;
            }
        }
        @media only screen and (max-width: 600px) {
            .container{
                width: 80%;
            }
        }
        @media only screen and (max-width: 500px) {
            .container{
                width: 90%;
            }
        }
        @media only screen and (max-width: 400px) {
            .container{
                width: 100%;
            }
        }
.hero{

background-image: url("student.jpg");

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
    </style>

</head>
<body class="hero">
<div class="navbar">
        <h2 >Welcome, <?php echo $_SESSION['user']['name']; ?></h2>
        <div class="logout">
            <a href="../logout.php"><button class="btn btn-danger">Logout</button></a>
        </div>
    </div>
    <div class="container" id="content">
        <div class="heading">
            <p class="h1 text-warning text-center"><i style="color:blue">Topics</i></p>
        </div>
        <div class="topic" id="topic">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col" style="color:#089303;"><i>Serial No</i></th>
                    <th scope="col" style="color:#089303;"><i>Topic</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "select * from topic";
                        $query = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($query)>0){
                            $count = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $count = $count + 1 ;
                    ?>
                                <tr>
                                    <td scope="row"  style="color:#089303;" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;"><?php echo $count; ?></td>
                                    <td data-toggle="modal" style="color:#089303;" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;"><?php echo $row['name']; ?></td>
                                </tr>
                    <?php
                            }
                        }
                        else{
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-topic">
        
        </div>
    </div>
    </div>

    <script>
        $(document).on('click','td[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('../teacher/view-topic.php',{
                viewid : dataid },
                function(data,status){
                    $('#view-topic').html(data);
                })
            });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>
<?php
}
else{
    header('location:../index.php');
}


?>
