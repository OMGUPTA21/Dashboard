<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
ob_start();
require '../connection.php';
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
        <button class="btn btn-primary" onclick="all_topic();"><i>All Topic<i></button>
    </div>
    <div class="heading">
        <p class="h1 text-warning text-center"><i style="color:beige">Add New Topic</i></p>
    </div>
    <div class="topic" id="topic">
        <form action="backend.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Topic Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="name" >
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="detail" placeholder="Write here the message">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Link</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="link">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Files</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" name="filelink[]" multiple>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function all_topic(){
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