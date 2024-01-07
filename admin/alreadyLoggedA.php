<?php
session_start();
if(isset($_SESSION['admin'])){

}
else{
    echo"<script>window.location.href = 'accessDeniedA.php';</script>";
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Already Logged in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="rounded-3 p-5 bg-white">
            <div class="table-responsive">
                <table class="table table-default rounded-4" data-bs-theme="light">
                    <tbody>
                        <tr>
                            <td scope="row" class="p-3">
                                <h2>You Are Already Logged In</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="p-3 text-center">
                                    <h4>Do You Want to Logout?</h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center p-3">
                                <a href="logoutA.php" class="btn btn-primary gap-2">
                                    Logout
                                </a>
                                <button type="button" onclick="history.back();" class="btn btn-secondary gap-2">
                                    Cancel
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>