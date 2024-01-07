<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<!-- Password Not Match Toast -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="notMatchToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <box-icon name='x-square' class="me-2" type='solid' color='#ff0000'></box-icon>
            <strong class="me-auto">SAS</strong>
            <label>Just Now</label>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Wrong Password Try Again!
        </div>
    </div>
</div>

<!-- User Not Found -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="notFoundToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <box-icon name='x-square' class="me-2" type='solid' color='#ff0000'></box-icon>
            <strong class="me-auto">SAS</strong>
            <label>Just Now</label>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            User Not Found!
        </div>
    </div>
</div>

<!-- Login Success Toast -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="loginSuccessToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <box-icon class="me-2" name='check-square' type='solid' color='#198754'></box-icon>
            <strong class="me-auto">SAS</strong>
            <label>Just Now</label>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Login Successful!!!
        </div>
    </div>
</div>

<!-- Details Not Filled -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="noDetailToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <box-icon name='x-square' class="me-2" type='solid' color='#ff0000'></box-icon>
            <strong class="me-auto">SAS</strong>
            <label>Just Now</label>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Please Fill Details
        </div>
    </div>
</div>

<body data-bs-theme="dark">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="rounded-3 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-default rounded-4" data-bs-theme="light">
                    <tbody>
                        <tr>
                            <td scope="row">
                                <h2>Student Attendance System</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">UserName</label>
                                    <input type="text" class="form-control uname" name="uname" id="uname"
                                        placeholder="Kirtan" required />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control pwd" name="pwd" id="pwd"
                                        placeholder="202200819010032" required />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="#">Forgot Password?</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary login" id="loginBtn">Signin</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
$(document).ready(function() {
    $(".login").click(function(e) {
        e.preventDefault();
        var uname = $('.uname').val()
        var pwd = $('.pwd').val()
        const noDetail = document.getElementById('noDetailToast')
        const loginSuccess = document.getElementById('loginSuccessToast')
        const notMatch = document.getElementById('notMatchToast')
        const notFound = document.getElementById('notFoundToast')

        if (uname != "" & pwd != "") {
            // const toastBootstrap1 = bootstrap.Toast.getOrCreateInstance(loginSuccess)
            // toastBootstrap1.show()
            $.ajax({
                type: "POST",
                url: "ajax-crud/student_Api.php",
                data: {
                    'checking_login': true,
                    'uname': uname,
                    'pwd': pwd
                },
                success: function(response) {
                    if (response === "Success") {
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(loginSuccess)
                        toastBootstrap.show()
                        setTimeout(() => {
                            window.location.href = "test.php";
                        }, 1500);
                    } else if (response === "Not Match") {
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(notMatch)
                        toastBootstrap.show()
                    } else if (response === "Not Found") {
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(notFound)
                        toastBootstrap.show()
                    }
                }
            });
        } else {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(noDetail)
            toastBootstrap.show()
        }
    });
});
</script>



<!-- <button type="button" class="btn btn-primary" onclick="model.showModal()"> Open Dialog Box </button>
        
<dialog id="model">
    This is model
    <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="model.close()">
            Close Dialog Box
    </button>
</dialog>  -->

<!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->