<?php
require("database.php");
$get_id = "SELECT id FROM adse WHERE username='souravsantra59680@gmail.com'";
$get_id_response = $db->query($get_id);
$id_data = $get_id_response->fetch_assoc($get_id_response);
$table_name = "user_".$id_data['id'];
print_r($table_name);




?>