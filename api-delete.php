<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Header: Content-type, Access-Control-Allow-Header, Access-Control-Allow-Methods, X-Requested-With, Authorization');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include "config.php";

$sql = "DELETE FROM students WHERE id = {$student_id}";

#mysqli_query() function executes SQL query statements

#mysqli_num_row returns the number of rows in a result set
#this function checks whether an single row has come or not
if(mysqli_query($conn,$sql)){ 
    echo json_encode(array('message' => 'Student Record Deleted', 'status' => true));

}else{
    echo json_encode(array('message' => 'Student Record Not Deleted', 'status' => false));
#json_encode convert array into json

}
?>