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
    <h1 class="h2">Add Standard</h1>
</div>
<div class="w-25 mx-2 fs-4">
    <form>
        <div class="mb-3">
            <label class="form-label ">Standard</label>
            <input type="number" class="form-control stan_val" placeholder="12" />
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary text-center addStan">
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
                <th scope="col">Standard</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="stdData">

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    
    const noDetail = document.getElementById('noDetailToast')
    const addSuccess = document.getElementById('SuccessToast')
    const deleteToast = document.getElementById('deleteToast')
    getData();
    $(document).on("click", '.delbtn', function() {
        var stanId = $(this).closest('tr').find('.standard_id').text();
        $('#delete_Modal').modal('show');
        $('#id_delete').val(stanId);
        $(".delete_record").off('click').on("click", function(e) {
            e.preventDefault();
            var stanId = $('#id_delete').val()
            console.log(stanId)
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    "checking_delStandard": true,
                    "delId": stanId
                },
                success: function(response) {
                    $('#delete_Modal').modal('hide');
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(deleteToast)
                    toastBootstrap.show()
                    $('.stdData').html("");
                    getData();
                }
            });
        });
    });

    $(".addStan").click(function(e) {
        e.preventDefault();
        var stan = $('.stan_val').val();
        if (stan != '') {
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    'checking_Stan_add': true,
                    'stan': stan,
                },
                success: function(response) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(addSuccess)
                    toastBootstrap.show()
                    $('.stdData').html("");
                    getData();
                    $('.stan_val').val("")
                }
            });
        } else {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(noDetail)
            toastBootstrap.show()
        }
    });
});

function getData() {
    $.ajax({
        type: "post",
        url: "ajax-crud/admin_Api.php",
        data: {
            "checking_stdReq": true
        },
        success: function(response) {
            $.each(response, function(key, value) {
                $(".stdData").append('\
                    <tr>\
                        <td hidden class="standard_id">' + value['S_Id'] + '</td>\
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