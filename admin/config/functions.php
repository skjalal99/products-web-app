<?php
function select1($tbl_name)
{
   $select = "SELECT * FROM $tbl_name";

    return  $select;

}

function printr($pr_r)
{
    echo "<pre>";
    print_r($pr_r);
    echo "</pre>";
}

//VALIDATE FORM DATA

function ivalidate($data) {
  
    // $data = trim($data);
   // $data = stripslashes($data);
    //$data = htmlspecialchars($data);
    return $data;

   
  }

?>

