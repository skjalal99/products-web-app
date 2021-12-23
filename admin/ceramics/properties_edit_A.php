
<?php include_once('../config/dbconn.php'); ?>

<?php

if(isset($_REQUEST['propert_id']))
{
    $propert_id = $_REQUEST['propert_id'];

        $sql1 = "SELECT * FROM properties WHERE id='$propert_id'";

        $res = $conn->query($sql1);

        if($res == TRUE){

                $row = mysqli_fetch_all($res, MYSQLI_ASSOC);


        }

        
echo json_encode($row);


   


}


?>


    

