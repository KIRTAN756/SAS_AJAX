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
    <h1 class="h2">NEWS</h1>
</div>
<div class="mx-2 fs-4 getNews">

</div>


<script>
$(document).ready(function() {
    getData()
});

function getData() {
    $.ajax({
        type: "POST",
        url: "ajax-crud/admin_Api.php",
        data: {
            "checking_getNEWS": true
        },
        success: function(response) {
            $.each(response, function(key, value) {
                $('.getNews').append('\
                    <div class="rounded-3" data-bs-theme="light" id="table">\
                        <div class="table-responsive">\
                            <table class="table table-default rounded-4">\
                                <tbody>\
                                    <tr align="left">\
                                        <td scope="row">'+value['Announcer_Name']+'</td>\
                                    </tr>\
                                    <tr>\
                                        <td>'+value['A_Message']+'</td>\
                                    </tr>\
                                    <tr align="right">\
                                        <td>'+value['Announcement_date']+'</td>\
                                    </tr>\
                                </tbody>\
                            </table>\
                        </div>\
                    </div>\
                    <br>\
                ')
            });
        }
    });
}
</script>