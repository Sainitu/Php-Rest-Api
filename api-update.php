<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type,
            Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$scity = $data['scity'];

include "config.php";

$sql = "UPDATE students SET student_name = '{$name}', age = {$age}, city = '{$city}' WHERE id = {$id}";

#mysqli_query() function executes SQL query statements

#mysqli_num_row returns the number of rows in a result set
#this function checks whether an single row has come or not
if( mysqli_query($conn,$sql) ){ 
    echo json_encode(array('message' => 'Student Record Updated', 'status' => true)); 

}else{
    echo json_encode(array('message' => 'Student Record Not Updated', 'status' => false));
#json_encode convert array into json

}
?>