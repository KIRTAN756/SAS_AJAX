<?php

session_start();

$con = mysqli_connect("localhost","root","","sas1");

if(isset($_POST["checking_Login"])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pwd'];
    $query = "SELECT * FROM admin_info WHERE A_Username = '$uname'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            if($pass == $row["A_Password"]){
                $_SESSION['aid'] = $row["A_Id"];
	    	    $_SESSION['admin'] = $uname;
                echo $return = "Success"; 
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

if(isset($_POST['checking_stdReq'])){
    $query = "SELECT * FROM standard_info ORDER BY Stan_Name";
    $query_run = mysqli_query($con,$query);
    $result_array = [];

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No Data Found';
    }
}

if(isset($_POST['checking_delStandard'])){
    $id = $_POST['delId'];
    $query = "DELETE FROM `standard_info` WHERE S_Id = '$id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo $return = "Deleted Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_Stan_add"])){
    $stan = $_POST["stan"];
    $query = "INSERT INTO `standard_info`(`Stan_Name`) VALUES ('$stan')";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        echo $return = "Added Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_getDiv"])){
    $query = "SELECT * FROM `division_info` ORDER BY Stan_Name,D_Name";
    $query_run = mysqli_query($con,$query);
    $result_array = [];
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No Data Found';
    }
}

if(isset($_POST['checking_add_Div'])){
    $stan = $_POST['stan'];
    $div = $_POST['div'];
    $query = "INSERT INTO `division_info` (`D_Name`, `Stan_Name`) VALUES ('$div','$stan')";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        echo $return = "Added Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_delDiv"])){
    $id = $_POST['delId'];
    $query = "DELETE FROM `division_info` WHERE D_Id = '$id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo $return = "Deleted Successfully";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_add_Pri"])){
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobno = $_POST['mobno'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO `principal_info`(`P_Name`, `P_Gender`, `P_Dob`, `P_Email`, `P_MobileNo`, `P_Address`, `P_Username`, `P_Password`) VALUES ('$fname','$gender','$dob','$email','$mobno','$address','$uname','$pwd')";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        echo $return = "Success";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_announce"])){
    $announce = $_POST['announce'];
    $announcer = $_POST['announcer'];

    $query = "INSERT INTO `announcement_info`(`Announcer_Name`, `A_Message`) VALUES ('$announcer','$announce')";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        echo $return = "Succes";
    }
    else{
        echo $return = "Something Went Wrong";
    }
}

if(isset($_POST["checking_getNEWS"])){
    $query = "SELECT * FROM `announcement_info`";
    $query_run = mysqli_query($con,$query);
    $result_array = [];
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No Data Found';
    }
}

if(isset($_POST["checking_divReq"])){
    $standard = $_POST['standard'];
    $query = "SELECT * FROM `division_info` WHERE Stan_Name = '$standard' ORDER BY D_Name";
    $query_run = mysqli_query($con,$query);
    $result_array = [];
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No Data Found';
    }
}

if(isset($_POST['checking_stu_data_Req'])){
    $standard = $_POST['standard'];
    $division = $_POST['division'];
    $result_array = [];
    $query = "SELECT `S_Id`, `S_Name`, `S_RollNo` FROM `student_info` WHERE S_Standard = '$standard' AND S_Division = '$division' ORDER BY S_RollNo";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No';
    }
}

if(isset($_POST['checking_stu_profile_Req'])){
    $result_array = [];
    $id = $_POST['id'];
    $query = "SELECT * FROM `student_info` WHERE S_Id = '$id'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No';
    }
}

if(isset($_POST['checking_faculty_leave_Req'])){
    $result_array = [];
    $query = "SELECT faculty_info.F_Name, faculty_info.F_Id, faculty_leave_info.L_Id, faculty_leave_info.Leave_Reason, faculty_leave_info.NoDays,faculty_leave_info.E_Date, faculty_leave_info.Leave_Status FROM faculty_info INNER JOIN faculty_leave_info on faculty_info.F_Id=faculty_leave_info.F_Id";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = 'No';
    }
}
?>