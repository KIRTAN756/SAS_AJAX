<?php
session_start();
if(isset($_SESSION['admin'])){

}
else{
    echo"<script>window.location.href = 'accessDeniedA.php';</script>";
}
?>

<div
    class="d-flex shadow justify-content-between flex-wrap sticky-top bg-body flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Leave Report (Faculty)</h1>
</div>
<hr>
<div class="table-responsive">
    <table class="table table-default">
        <thead>
            <tr class="sticky-top">
                <th>Leave ID</th>
                <th scope="col">Name</th>
                <th scope="col">Reason</th>
                <th scope="col">No Days</th>
                <th scope="col">Reply</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody class="facultyData">

        </tbody>
    </table>
</div>

<script>

$(document).ready(function() {
    getData();
});

function getData() {
    $.ajax({
        type: "POST",
        url: "ajax-crud/admin_Api.php",
        data: {
            "checking_faculty_leave_Req": true,
        },
        success: function(response) {
            if (response === "No") {
                $('.facultyData').append('\
                    <tr>\
                        <td colspan="3" align="center">No Data Found</td>\
                    </tr>\
                ')
            } else {
                $.each(response, function(key, value) {
                    $('.facultyData').append('\
                        <tr>\
                            <td>' + value['L_Id'] + '</td>\
                            <td>' + value['F_Name'] + '</td>\
                            <td>' + value['Leave_Reason'] + '</td>\
                            <td>' + value['NoDays'] + '</td>\
                            <td>' + value['Leave_Status'] + '</td>\
                            <td>' + value['E_Date'] + '</td>\
                        </tr>\
                    ')
                });
            }
        }
    });
}
</script>