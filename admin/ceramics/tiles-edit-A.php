
<?php include_once('../config/dbconn.php'); ?>

<?php

if (isset($_REQUEST['tiles_id'])) {
     $tiles_id = $_REQUEST['tiles_id'];
     $size_id = $_REQUEST['size_id'];
     $cat_id = $_REQUEST['cat_id'];


    $sql1 = "SELECT tiles.id as tilesid, categories.id as catid,sizes.id as sizeid,sizes.sizes,categories.type,tiles.tile_model_no,
    tiles.tile_img,tiles.thickness,tiles.cm,tiles.effect, tiles.color,
    tiles.usage,tiles.surface,tiles.material, tiles.qty_per_box,tiles.status1
    FROM ((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
    JOIN categories ON categories.id = tiles.categories_id)
    WHERE tiles.id = '$tiles_id' AND sizes.id = '$size_id' AND categories.id = '$cat_id' ";



    $res = $conn->query($sql1);

    $data = array();

    $row = $res->fetch_assoc();
    $data[] = $row;

    
    echo json_encode($data);  
    

}
?>


    

