
<?php
require "../connection.php";
$id = $_POST['viewid'];
$sql = "select * from topic where id='$id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);

?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><i style="color:green"><?php echo $row['name'];?></i></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <div class="detail">
        <p><i style="color:green"><?php echo $row['detail'];?></i></p>
    </div>
    <?php
        if($row['link']!=''){
    ?>
    <div class="link">
        <a href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a>
    </div><br>
    <?php
        }
    ?>
    <div class="file">
    <?php
        if($row['file']==''||$row['file']==NULL){
        ?>
    <?php
        }
        else{
            $array=explode(",",$row['file']);
            $i=0;
            foreach($array as $file){
                $i=$i+1;
                if($file=='')
                {
                    break;
                }
    ?>
        <div class="file-btn">
            <a href="<?php echo $file;?>" target="_blank" download><button class="btn btn-outline-success" >
                    <?php 
                        $filename=explode("/",$file);
                        foreach($filename as $notes){
                            if($notes=='')
                            {
                                break;
                            }
                            else
                                $seenote=$notes;
                        }
                        echo $seenote; 
                    ?>
            </button></a>
            </div>
            <?php
                    }
                    ?>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>