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
    <h1 class="h2">Add Division</h1>
</div>
<div class="w-25 mx-2 fs-4">
    <form>
        <div class="mb-3">
            <div class="dropdown form-group">
                <label>Standard</label>
                <select class="form-control stan_val" required>
                    <option disabled selected>--</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label ">Division</label>
            <input type="text" class="form-control div_val" placeholder="A" />
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary text-center addDiv">
                Add
            </button>
        </div>
    </form>
</div>
<hr>
<div class="table-responsive w-50">
    <table class="table table-default">
        <thead>
            <tr>
                <th>Division</th>
                <th scope="col">Standard</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="divData">

        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    getStandard();
    getDivData();
    const noDetail = document.getElementById('noDetailToast')
    const addSuccess = document.getElementById('SuccessToast')
    const deleteToast = document.getElementById('deleteToast')
    $(".addDiv").click(function(e) {
        e.preventDefault();
        var stan = $('.stan_val').val()
        var div = $('.div_val').val()
        const noDetail = document.getElementById('noDetailToast')
        if (stan != '' & div != '') {
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    "checking_add_Div": true,
                    "stan": stan,
                    "div": div
                },
                success: function(response) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(addSuccess)
                    toastBootstrap.show()
                    $('.divData').html("");
                    getDivData();
                    $('.stan_val').val("--")
                    $('.div_val').val("")
                }
            });
        } else {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(noDetail)
            toastBootstrap.show()
        }
    });

    $(document).on("click", '.delbtn', function() {
        var divId = $(this).closest('tr').find('.div_id').text();
        $('#id_delete').val(divId);
        $('#delete_Modal').modal('show');
        $(".delete_record").off('click').on("click",function(e) {
            e.preventDefault();
            var divId = $('#id_delete').val()
            console.log(divId)
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    "checking_delDiv": true,
                    "delId": divId
                },
                success: function(response) {
                    $('#delete_Modal').modal('hide');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(deleteToast)
                    toastBootstrap.show()
                    $('.divData').html("");
                    getDivData();
                }
            });
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

function getDivData() {
    $.ajax({
        type: "post",
        url: "ajax-crud/admin_Api.php",
        data: {
            "checking_getDiv": true
        },
        success: function(response) {
            $.each(response, function(key, value) {
                $('.divData').append('\
                    <tr>\
                        <td hidden class="div_id">' + value['D_Id'] + '</td>\
                        <td>' + value['D_Name'] + '</td>\
                        <td>' + value['Stan_Name'] + '</td>\
                        <td>\
                            <a href="#" class="badge bg-danger delbtn">Delete</a>\
                        </td>\
                    </tr>\
                ')
            });
        }
    });
}
</script>