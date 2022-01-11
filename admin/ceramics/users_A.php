<?php include_once('../config/dbconn.php'); ?>

<?php
$id = $_REQUEST['edit_id1'];

                $sql_users = "SELECT users.id,company.id as cid,users.user_name,users.full_name,
                users.role,users.status,users.contact,users.password,
                company.co_name,company.description
                FROM ((users
                JOIN users_has_company ON users.id = users_has_company.users_id)
                JOIN company ON company.id = users_has_company.company_id)
                WHERE users.id = '$id '";
                $res_modal1 = $conn->query($sql_users);
  
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