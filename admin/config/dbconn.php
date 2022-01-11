<?php

define("SITE_URL_ADMIN", "http://localhost/products-web-app/admin");


// echo SITE_URL;

define("SERVER_NAME","localhost");
define("USER_NAME","root");
define("PASS","");
define("DB_NAME","products-web");


// Create connection
$conn = new mysqli(SERVER_NAME, USER_NAME, PASS, DB_NAME);

if($conn){
  //  echo "successfully connected \n";

}



?>