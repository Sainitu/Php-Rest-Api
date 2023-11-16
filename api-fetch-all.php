<?php

    header('Content-type: application/json');
    header('Access-Control-Allow-Origin: *');

    include "config.php";

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql) or die("SQL Query Failed");
    #mysqli_query() function executes SQL query statements

    #mysqli_num_row returns the number of rows in a result set
    if(mysqli_num_rows($result) > 0 ){ #this function checks whether an single row has come or not
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); #Mysqli_assoc is used to convert it into associative array
    echo json_encode($output);

    }else{
        echo json_encode(array('message' => 'No Record Found', 'status' => false));
    #json_encode convert array into json

    }

    #'Content-type: application/json' shows that this file give data in only json format

?>