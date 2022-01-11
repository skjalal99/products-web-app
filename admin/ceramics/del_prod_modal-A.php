<?php include_once('../config/dbconn.php'); ?>

<?php
$delid = $_REQUEST['delid'];
                $sr=1;
                $sql_modal_edit = "SELECT tiles_modal.id as tiles_id,tiles_modal.tiles_id as tiles_id2, tiles_modal.Display as display,tiles_modal.image_thumb as imgg
                FROM tiles JOIN tiles_modal ON tiles.id = tiles_modal.tiles_id WHERE tiles_id = $delid";
  
                $res_modal1 = $conn->query($sql_modal_edit);
  
                if ($res_modal1 == true) {
                    $count_modal1 = $res_modal1->num_rows;
                   
                    if ($count_modal1 >0) {
                        $row_modal1 = $res_modal1->fetch_all(MYSQLI_ASSOC);

                            echo json_encode($row_modal1);
                            
                    } else {
                        echo "No Data";
                    }
                }
                              
            ?>