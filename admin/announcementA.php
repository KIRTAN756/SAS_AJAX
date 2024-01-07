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
    <h1 class="h2">Make Announcement</h1>
</div>
<div class="mx-2 fs-4">
    <form>
        <input type="hidden" class="announcer" value="<?php echo $_SESSION['admin'];?>"/>
        <div class="form-group mb-3">
            <label class="form-label">Announcement</label>
            <textarea class="form-control announce" placeholder='Announce' rows="8"></textarea>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary text-center addannounce">
                Announce
            </button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    const noDetail = document.getElementById('noDetailToast')
    const addSuccess = document.getElementById('SuccessToast')
    $(".addannounce").click(function(e) {
        e.preventDefault();
        var announce = $('.announce').val()
        var announcer = $('.announcer').val()
        const noDetail = document.getElementById('noDetailToast')
        if (announce != '') {
            $.ajax({
                type: "POST",
                url: "ajax-crud/admin_Api.php",
                data: {
                    "checking_announce": true,
                    "announce": announce,
                    "announcer": announcer
                },
                success: function(response) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(addSuccess)
                    toastBootstrap.show()
                    $('.announce').val("")
                }
            });
        } else {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(noDetail)
            toastBootstrap.show()
        }
    });
});

</script>