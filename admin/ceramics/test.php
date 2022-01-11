if(isset($Aimage))
     {
       
       
              printr($Aimage);
              //Get the image name
              $Aimage_name=$Aimage['name']; 
              $Aimage_tmp=$Aimage['tmp_name']; 
              $Aimage_size=$Aimage['size']; 


                // Check file size
                if ($Aimage_size > 1024000) {
                  echo "<div class='alert alert-warning col-sm-6'>Sorry, File should be less than 1mb.</div>";
                  $uploadOk = FALSE;
                }

              //auto renaming and getting extension of image
              $ext = explode('.', $Aimage_name);
              $ext = end($ext);

              //Rename image
            echo $Aimage = "Tile_".rand(00000,99999).'.'.$ext; // eg:tile_12321.jpg

            // Get from source path
            echo $source_path = $Aimage_tmp;

            // set the destination path
            $destination_path = "../../assets/images/tiles/".$Aimage;

              if($uploadOk == FALSE)
              {
                echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Image not uploaded;</div>";
                //echo "<meta http-equiv='refresh' content='1'>";
            
              }
              else
              {
                  // move the uploaded file to destination
                  $upload = move_uploaded_file($source_path, $destination_path);

                  //if upload file failed
                  if($upload == FALSE)
                  {

                    echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Something Went Wrong;</div>";
                    //echo "<meta http-equiv='refresh' content='1'>";

                      die();

                  }

              }
            
            
              
              

    }   
    else
    {
              echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Image Not set;</div>";
              //echo "<meta http-equiv='refresh' content='1'>";

    }
                

              $sql_tiles ="INSERT INTO `tiles` (`tile_model_no`, `tile_img`, `thickness`, `cm`, `effect`, `color`, `usage`, `surface`, `material`, `qty_per_box`, `status1`, `sizes_id`, `categories_id`, `created_on`)VALUES ( '$Amodelno','$Aimage','$Amm','$Acm','$Aeffect','$Acolor','$Ausage','$Afinish','$Amaterial','$Aqty','$Astatus','$Asize', '$Acat',now())";

              $conn->query($sql_tiles) or die(mysqli_error($conn));

              $last_id_in_tiles =  mysqli_insert_id($conn);

              
                        $sql_in = 'INSERT INTO `tiles_has_properties` (`tiles_id`, `properties_id`) values';
                      
                        foreach($Acheckbox as $checked)
                        {
                          $insert = $checked;
                          $sql_in .="('$last_id_in_tiles',$insert),";
                        
                        }
                      echo $sql_in=rtrim($sql_in,",");
                      // $conn->query($sql_in);