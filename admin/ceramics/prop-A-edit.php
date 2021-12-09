
<?php include_once('../config/dbconn.php'); ?>

<?php

if(isset($_REQUEST['tiles_id_prop']))
{
    $prop_id = $_REQUEST['tiles_id_prop'];
//    echo "id recieved:".$prop_id;

                   
                    $sql_prop = "SELECT properties.id,properties.title
                            FROM ((tiles JOIN tiles_has_properties ON tiles.id = tiles_has_properties.tiles_id) 
                            JOIN properties ON properties.id = tiles_has_properties.properties_id)
                            WHERE tiles_has_properties.tiles_id = '$prop_id'";

                    $res_prop = $conn->query($sql_prop);

                    $data = array();
                //     $row= mysqli_fetch_all($res_prop, MYSQLI_ASSOC);
                //     // $row = $res_prop->fetch_array();
                //     $data[] = $row;
                
while($row = $res_prop->fetch_assoc())
{
        $data[] = $row;
}



                
                    
                   echo json_encode($data);  


                    

   


}


?>


    

