<?php

$con = mysqli_connect("localhost","root","","sas1");

if(isset($_POST["checking_login"])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pwd'];
    $query = "SELECT * FROM student_info WHERE S_Username = '$uname'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $row) {
            if($pass == $row['S_Password']){
                echo $return = 'Success';
            }
            else{
                echo $return = 'Not Match';
            }
        }
    }
    else{
        echo $return = 'Not Found';
    }
}

?>