
<?php include_once('../admin/config/dbconn.php');?>

<?php

if(isset($_REQUEST['did']))
{
     $tiles_id = $_REQUEST['did'];
   // echo "id recieved";

                   
 $sql_modal = "SELECT tiles.id as tilesid, categories.id as catid,sizes.id as sizeid,sizes.sizes,
               categories.type,tiles.tile_model_no, tiles.tile_img,tiles.thickness,tiles.cm,
               tiles.effect, tiles.color, tiles.usage,tiles.surface,tiles.material, 
               tiles.qty_per_box,tiles.status1 FROM
               ((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
               JOIN categories ON categories.id = tiles.categories_id)
               WHERE tiles.id = $tiles_id";

                    $res_modal = $conn->query($sql_modal);

                    if($res_modal == TRUE)
                    {
                        $count1 = $res_modal->num_rows;

                        

                        if($count1 >0)
                        {
                           $row_modal = $res_modal->fetch_assoc();

                           $modal_data[] = $row_modal;
                        
                        }
                       
                    }

                    echo json_encode($modal_data);


}


?>


    

