
<?php include_once('../admin/config/dbconn.php');?>

<?php

if(isset($_REQUEST['did1']))
{
     $tiles_id = $_REQUEST['did1'];
   // echo "id recieved";

                   
    $sql_modal = "SELECT TILES.id, TILES.tile_img, tiles_modal.id,
              tiles_modal.image_thumb,tiles_modal.tiles_id,
              tiles_modal.status1,tiles_modal.Display 
              FROM TILES JOIN tiles_modal ON tiles.id = tiles_modal.tiles_id 
              WHERE tiles.id='$tiles_id' and tiles_modal.Display='enable' and tiles_modal.status1='active'";

                    $res_modal = $conn->query($sql_modal);

                    if($res_modal == TRUE)
                    {
                        $count2 = $res_modal->num_rows;

                        

                        if($count2 >0)
                        {
                           while ($row_modal = $res_modal->fetch_assoc()) {
                              $modal_data[] = $row_modal;
                           $tile_img = $row_modal['image_thumb'];

                    // echo  "<div class='carousel-inner'>
                    //            <div class='carousel-item '>
                    //                <img src='../assets/images/assets/images/2-a.jpg' class='d-block w-100'>
                    //            </div>
                               
                    //        </div>
                          
                    //        <ol class='carousel-indicators'>

                    //             <li data-bs-target='#WallModalIndicators' data-bs-slide-to='0' class='active thumbnail'>
                    //             <img src='../assets/images/assets/images/2-a.jpg' class='d-block w-100'>
                    //             </li>
                                                    
                    //        </ol>
                    //       ";



                           }
                        
                        }
                       
                    }

                   echo json_encode($modal_data);


}


?>


    

