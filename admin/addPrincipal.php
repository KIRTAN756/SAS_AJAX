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
    <h1 class="h2">Add Principal</h1>
</div>
<div class="w-50 mx-2 fs-4 p-3">
    <form>
        <div class="mb-3">
            <label class="form-label ">Full Name</label>
            <input type="text" class="form-control fname" placeholder="John Doe" />
        </div>
        <div class="mb-3 gap-2">
            <label class="form-label">Gender </label>
            <div class="gap-2 form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label ">Birth Date</label>
            <input type="date" class="form-control dob" />
        </div>
        <div class="mb-3">
            <label class="form-label ">Email</label>
            <input type="email" class="form-control email" placeholder="Something@gmail.com" />
        </div>
        <div class="mb-3">
            <label class="form-label ">Mobile No</label>
            <input type="text" pattern="[0-9]{10}" maxlength="10" class="form-control mobno" placeholder="9595786214" />
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control address" placeholder='Address' rows="2"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label ">Username</label>
            <input type="text" class="form-control uname" placeholder="John Doe" />
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control pwd" />
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary text-center addPri px-4">
                Add
            </button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    const noDetail = document.getElementById('noDetailToast')
    const addSuccess = document.getElementById('SuccessToast')
    $('.addPri').click(function(e) {
        e.preventDefault();
        var genderVal = $('input[name="gender"]:checked').val();
        var address = $('.address').val()
        var dob = $('.dob').val()
        var uname = $('.uname').val()
        var pwd = $('.pwd').val()
        var fname = $('.fname').val()
        var email = $('.email').val()
        var mobno = $('.mobno').val()
        if (address != "" & dob != "" & uname != '' & pwd != '' & fname != '' & email !=
            '' & mobno != '') {
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    'checking_add_Pri': true,
                    'fname': fname,
                    'uname': uname,
                    'pwd': pwd,
                    'gender': genderVal,
                    'dob': dob,
                    'email': email,
                    'mobno': mobno,
                    'address': address
                },
                success: function(response) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(addSuccess)
                    toastBootstrap.show()
                    $('.address').val("")
                    $('.dob').val("")
                    $('.uname').val("")
                    $('.pwd').val("")
                    $('.fname').val("")
                    $('.email').val("")
                    $('.mobno').val("")
                    $('input[name="gender"]').prop('checked', false);
                }
            });
        } else {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(noDetail)
            toastBootstrap.show()
        }
    });
});
</script>