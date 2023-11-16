<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include "config.php";

$sql = "SELECT * FROM students WHERE id = {$student_id}";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed");
#mysqli_query() function executes SQL query statements

#mysqli_num_row returns the number of rows in a result set
#this function checks whether an single row has come or not
if(mysqli_num_rows($result) > 0 ){ 
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); #Mysqli_assoc is used to convert it into associative array
    echo json_encode($output);

}else{
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
#json_encode convert array into json

}
?>