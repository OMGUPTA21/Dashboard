<?php
require "../connection.php";
$email = $_POST['viewid'];

$sql = "select * from login where email='$email'";
$query = mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($query);
$role = $res['role'];
if($role =='teacher'){
    $sql = "select * from teachers where email='$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
}
else if($role=='student'){
    $sql = "select * from students where email='$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
}


?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><i style="color:green;"><?php echo $row['name'];?></i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <?php
    if($role == 'teacher'){
    ?>
    <table class="table table-striped table-white">
    <tbody>
        <tr>
            <td>Designation</td>
            <td><?php echo $row['designation']; ?></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><?php echo $row['dob']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
    </tbody>
    </table>
    <?php
    }
    elseif($role=='student'){
    ?>
    <table class="table table-striped table-white">
        <tbody>
            <tr>
                <td>Roll Number</td>
                <td><?php echo $row['roll']; ?></td>
            </tr>
            <tr>
                <td>Stream</td>
                <td><?php echo $row['stream']; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td><?php echo $row['sem']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $row['dob']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>