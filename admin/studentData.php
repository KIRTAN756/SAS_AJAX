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
    <h1 class="h2">Student Data</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2 gap-2">
            <div class="dropdown form-group d-flex align-items-center gap-2">
                <label>Standard</label>
                <select class="form-control stan_val std_click" name="stan_val" required>
                    <option disabled selected>--</option>
                </select>
            </div>
            <div class="dropdown form-group d-flex align-items-center gap-2">
                <label>Division</label>
                <select class="form-control div_val div_click" name="div_val" required>
                    <option disabled selected>--</option>
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="table-responsive w-50">
    <table class="table table-default">
        <thead>
            <tr class="sticky-top">
                <th>Roll No</th>
                <th scope="col">Name</th>
                <th scope="col">Profile</th>
            </tr>
        </thead>
        <tbody class="stuData">

        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    getStandard();
    var standard;
    var division;


    $(document).off('change', '.std_click').on('change', '.std_click', function() {
        standard = $('.stan_val').val()
        $('.div_val').html("")
        $.ajax({
            type: "POST",
            url: "ajax-crud/admin_Api.php",
            data: {
                "checking_divReq": true,
                "standard": standard
            },
            success: function(response) {
                var selectDiv = $('.div_val');
                selectDiv.append($('<option>', {
                    disabled: true,
                    text: "--",
                    selected: true
                }));
                $.each(response, function(key, value) {
                    selectDiv.append($('<option>', {
                        value: value["D_Name"],
                        text: value["D_Name"]
                    }));
                });
            }
        });
    });

    $(document).off('change', '.div_click').on("change", '.div_click', function() {
        division = $('.div_val').val()
        $('.stuData').html("")
        $.ajax({
            type: "POST",
            url: "ajax-crud/admin_Api.php",
            data: {
                "checking_stu_data_Req": true,
                "standard": standard,
                "division": division
            },
            success: function(response) {
                if (response === "No") {
                    $('.stuData').append('\
                    <tr>\
                        <td colspan="3" align="center">No Data Found</td>\
                    </tr>\
                ')
                } else {
                    $.each(response, function(key, value) {
                        $('.stuData').append('\
                        <tr>\
                            <td class="sid" hidden>' + value['S_Id'] + '</td>\
                            <td>' + value['S_RollNo'] + '</td>\
                            <td>' + value['S_Name'] + '</td>\
                            <td>\
                                <a href="#" class="badge bg-primary viewBtn">Profile</a>\
                            </td>\
                        </tr>\
                    ')
                    });
                }
            }
        });
    });

    $(document).on("click", ".viewBtn", function() {
        var id = $(this).closest('tr').find('.sid').text();
        $.ajax({
            type: "POST",
            url: "ajax-crud/admin_Api.php",
            data: {
                "checking_stu_profile_Req": true,
                "id":id
            },
            success: function(response) {
                $.each(response, function (ket, value) { 
                    $('.id_view').val(id);
                    $('.fname_view').val(value['S_Name']);
                    $('.rollNo_view').val(value['S_RollNo']);
                    $('.standard_view').val(value['S_Standard']);
                    $('.division_view').val(value['S_Division']);
                    $('.gender_view').val(value['S_Gender']);
                    $('.dob_view').val(value['S_Dob']);
                    $('.mobno_view').val(value['S_MobileNo']);
                    $('.email_view').val(value['S_Email']);
                    $('.address_view').val(value['S_Address']);
                    $('#view_stu_Modal').modal('show');
                });
            }
        });
    });
});

function getStandard() {
    $.ajax({
        type: "POST",
        url: "ajax-crud/admin_Api.php",
        data: {
            "checking_stdReq": true
        },
        success: function(response) {
            var select = $('.stan_val');
            $.each(response, function(key, value) {
                select.append($('<option>', {
                    value: value["Stan_Name"],
                    text: value["Stan_Name"]
                }));
            });
        }
    });
}
</script>