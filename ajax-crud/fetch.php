<?php

$con = mysqli_connect("localhost","root","","styleit");

$query = "SELECT * FROM tailor_info";

$query_run = mysqli_query($con,$query);
$result_array = [];

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
}
else {
    echo $return = "<h4>No Record Found</h4>";
}

?>