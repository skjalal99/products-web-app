<?php include_once('../config/dbconn.php'); ?>

<?php
      if (isset($_REQUEST['tiles_id'])) {
          $id =  $_REQUEST['tiles_id'];
          $sql1 = "SELECT tiles_modal.id as id1,tiles.id as id2,tiles.tile_model_no,tiles_modal.date,tiles_modal.status1,tiles_modal.Display
          FROM tiles_modal JOIN tiles ON tiles.id = tiles_modal.tiles_id WHERE tiles_modal.tiles_id='$id';";

          $res1 = $conn->query($sql1);

          $data = array();
          if ($res1 == true) {
              if ($res1->num_rows > 0) {
                  while ($row = $res1->fetch_assoc()) {
                      $data[] = $row;
                      
                  }
              }
          }


        echo json_encode($data);
      }
 ?>