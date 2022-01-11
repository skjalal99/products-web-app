<?php include_once('../config/dbconn.php'); ?>

<?php

 //$E_modelno = $_REQUEST['E_modelno'];
 $tilemodelid = $_REQUEST['tilemodelid'];
 $Emodal_status = $_REQUEST['Emodal_status'];
 if($Emodal_status == "Yes")
 {
  $Emodal_status = 'Active';

 }
 else
 {
  $Emodal_status = 'InActive';
 }

 if(isset($_REQUEST['checktoshow']))
 {
   $TOdisplay = 'Enable';
   $NOTtodisplay = 'Disable';

   $sql1 = "UPDATE `tiles_modal` SET status1 = '$Emodal_status',`Display` = '$TOdisplay' WHERE tiles_id = '$tilemodelid' AND `id` IN(";
  
   $sql2 = "UPDATE `tiles_modal` SET status1 = '$Emodal_status',`Display` = '$NOTtodisplay' WHERE tiles_id = '$tilemodelid' AND `id` NOT IN(";
 

   foreach ($_REQUEST['checktoshow'] as $id) {
    
       $sql1.= "'".$id."',";

       $sql2.= "'".$id."',";
 
   }
    $sql1 = trim($sql1,',').')';

    $sql2 = trim($sql2,',').')';
    //  $sql1. = 'sdfsd)';
    // echo $sql1;
    // echo "</br>";
    // echo $sql2;



    $res_modal1 = $conn->query($sql1);
    $res_modal2 = $conn->query($sql2);
    if ($res_modal1 == TRUE && $res_modal2 == TRUE)
    { echo "0";}else{ echo "1";}

 }
 else{
          echo "something went wrong";
 }



 ?>

      