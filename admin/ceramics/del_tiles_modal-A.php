<?php include_once('../config/dbconn.php'); ?>

<?php
  $id = $_REQUEST['Did'];
  

$sql =  "DELETE FROM TILES_MODAL WHERE ID = '$id'";

$res = $conn->query($sql);

if($res == TRUE)
{

            echo '0';


}
else
{
    echo '1';
}
               

                              
?>