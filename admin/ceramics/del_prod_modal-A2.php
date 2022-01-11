<?php include_once('../config/dbconn.php'); ?>

<?php
  $id = $_REQUEST['delid'];
  $imgsrc = $_REQUEST['imgsrc'];

$sql =  "DELETE FROM TILES_MODAL WHERE ID = '$id'";

$res = $conn->query($sql);

if($res == TRUE)
{

$ulink = unlink($imgsrc);
        if($ulink == TRUE)
        {
            echo '0';
        }

}
else
{
    echo '1';
}
               

                              
?>