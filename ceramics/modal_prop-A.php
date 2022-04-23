
<?php include_once('../admin/config/dbconn.php');?>

<?php

if(isset($_REQUEST['did']))
{
   $prop_id = $_REQUEST['did'];
   // echo "id recieved";

                   
                    $sql_prop = "SELECT properties.title,properties.description,properties.image
                            FROM ((tiles JOIN tiles_has_properties ON tiles.id = tiles_has_properties.tiles_id) 
                            JOIN properties ON properties.id = tiles_has_properties.properties_id)
                            WHERE tiles_has_properties.tiles_id = '$prop_id'";

                    $res_prop = $conn->query($sql_prop);

                    if ($res_prop == true) {
                        $count1 = $res_prop->num_rows;

                        if ($count1 >0) {
                         while($row_prop = $res_prop->fetch_assoc()) 
                          {
                            $prop_title = $row_prop['title'] ;
                            $prop_desc = $row_prop['description'] ;
                            $prop_img = $row_prop['image'] ; 
                            
                           


                                     echo "<div class='d-flex'>
                                     <div class='icon-img'>
                                       <img class='rounded-circle' src='../assets/images/properties/$prop_img' alt='' srcset=''>
                                     </div>
                                     <div>
                                       <h6>$prop_title</h6>
                                       <p>$prop_desc</p>
                                     </div>       
                               </div>
                               ";

                          }
                        }
                        else
                          {
                        echo '<tr >
                            <td colspan="5">
                                    No Data to display!
                                    </span>
                                  </td>
                            </tr >';
                          }

                    }


}


?>


    

