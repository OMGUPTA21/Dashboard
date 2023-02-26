<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ob_start();
require '../connection.php';
if($_SESSION['login'] && $_SESSION['admin']){
    $sql = "select * from teachers";
    $query = mysqli_query($conn,$sql);
    $users = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../teacher/style.css">
    <?php
        include '../link.php';
    ?>
    

</head>
<body>
<div class="heading" style="display: flex;">
        <p class="h1 text-warning text-center" style="margin: auto;"><i style="color:beige;">Teachers:</i><span class="text-primary"><i style="color:beige;"><?php echo $users; ?></i></span></p>
    </div>
    <div class="topic" id="topic">
        <table class="table table-hover">
            <thead>
                <tr>
               
                <th scope="col"><i>Serial No.</i></th>
                <th scope="col"><i>Name</i></th>
                <th scope="col"><i>Email</i></th>
                <th scope="col"><i>Role</i></th>
                <th  style="min-width:50px; width:10%;"><i>Action</i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query)>0){
                        $count = 0;
                        while($row = mysqli_fetch_assoc($query)){
                            $count = $count + 1 ;
                ?>
                            <tr>
                                <td style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['email'];?>"><?php echo $count; ?></td>
                                <td style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['email'];?>"><?php echo $row['name']; ?></td>
                                <td style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['email'];?>"><?php echo $row['email']; ?></td>
                                <td style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['email'];?>"><?php echo $row['designation']; ?></td>
                                <td><button class="btn btn-danger" style="margin: 0px;" data-role="delete" data-id="<?php echo $row['id'];?>">Delete</button></td>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-user">
        
        </div>
    </div>
    </div>

    <script>
        $(document).on('click','td[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('view-user.php',{
                viewid : dataid },
                function(data,status){
                    $('#view-user').html(data);
                })
            });
            $(document).on('click','button[data-role=delete]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('delete-user.php',{
                viewid : dataid },
                function(data,status){
                    $('#content').html(data);
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