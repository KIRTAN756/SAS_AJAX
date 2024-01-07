<?php

$con = mysqli_connect("localhost","root","","styleit");


if(isset($_POST["checking_add"])){

    $tname = $_POST["tname"];
    $mobno = $_POST["mobno"];
    $email = $_POST["email"];
    $org = $_POST["org"];
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];

    $query = "INSERT INTO `tailor_info`(`Tailor_Name`, `Tailor_MobileNo`, `Tailor_Email`, `Tailor_Org`, `Tailor_userName`, `Tailor_Password`) VALUES ('$tname','$mobno','$email','$org','$uname','$pwd')";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo $return = "Added Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_view"])){
    $tailorId = $_POST["tailorId"];
    $result_array = [];
    $query = "SELECT * FROM tailor_info WHERE Tailor_id = '$tailorId'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach ($query_run as $row) {
            array_push($result_array,$row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = "Not Found";
    }
}

if(isset($_POST["checking_edit"])){
    $tailorId = $_POST["tailorId"];
    $result_array = [];
    $query = "SELECT * FROM tailor_info WHERE Tailor_id = '$tailorId'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach ($query_run as $row) {
            array_push($result_array,$row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = "Not Found";
    }
}

if(isset($_POST["checking_update"])){

    $tname = $_POST["tname"];
    $mobno = $_POST["mobno"];
    $email = $_POST["email"];
    $org = $_POST["org"];
    $uname = $_POST["uname"];
    $id = $_POST["id"];

    $query = "UPDATE `tailor_info` SET `Tailor_Name`='$tname',`Tailor_MobileNo`='$mobno',`Tailor_Email`='$email',`Tailor_Org`='$org',`Tailor_userName`='$uname' WHERE Tailor_id = '$id'";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo $return = "Updated Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_delete"])){

    $tailorId = $_POST["tailorId"];
    $query = "DELETE FROM `tailor_info` WHERE Tailor_id = '$tailorId'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo $return = "Deleted Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}


?>