<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ob_start();
require '../connection.php';//connection file...
if($_SESSION['login'] && $_SESSION['teacher']){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics</title>
    <?php
        include '../link.php';
    ?>
</head>
<body>
    <div class="add-topic">
        <button class="btn btn-success" onclick="add_topic();">Add Topic</button>
    </div>
    <div class="heading">
        <p class="h1 text-warning text-center"><i style="color:blue;">Topics</i></p>
    </div>
    <div class="topic" id="topic">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col"><i style="color:green;">Serial No.</i></th>
                <th scope="col"><i style="color:green;">Topic</i></th>
                <th  style="min-width:50px; width:10%;"><i style="color:green;">Action</i></th>
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
                                <td scope="row" data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;"><?php echo $count; ?></td>
                                <td data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;"><?php echo $row['name']; ?></td>
                                <td><button class="btn btn-danger" data-role="delete" data-id="<?php echo $row['id'];?>">Delete</button></td>
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
        <div class="modal-content" id="view-topic">
        
        </div>
    </div>
    </div>


    <script>
        $(document).on('click','td[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('view-topic.php',{
                viewid : dataid },
                function(data,status){
                    $('#view-topic').html(data);
                })
            });
            $(document).on('click','button[data-role=delete]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('delete-topic.php',{
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
