<?php

session_start();

if(isset($_SESSION['admin'])){
    session_destroy();
    echo "<script>";
    echo "setTimeout(() => {";
            echo "window.location.href = '../adminLogin.php';";
        echo "}, 1000);";
    echo "</script>";    
}
else{
    echo"<script>window.location.href = 'accessDeniedA.php';</script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body data-bs-theme="dark">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="rounded-3 p-4 bg-white">
            <div class="table-responsive">
                <form method="post">
                    <table class="table table-default rounded-4" data-bs-theme="light">
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <h2>Student Attendance System</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <div class="mb-3">
                                        <label class="form-label fs-2">Logging Out</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>
