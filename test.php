<!doctype html>
<html lang="en">

<head>
    <title>CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<!-- Add Modal -->
<div class="modal fade modal-lg" id="Tailor_AddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tailor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-message">

                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Tailor Name</label>
                        <input type="text" class="form-control tname" name="tname" placeholder="Kirtan" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Mobile No</label>
                        <input type="number" class="form-control mobno" name="mobno" placeholder="9995556661" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control email" name="email" placeholder="Something@gmail.com" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Organization</label>
                        <input type="text" class="form-control org" name="org" placeholder="Raymond" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control uname" name="uname" placeholder="Kirtan" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control pwd" name="pwd" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tailor_add_ajax">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade modal-lg" id="Tailor_ViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tailor Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="id_view"></h4>
                <h4 class="tname_view"></h4>
                <h4 class="mobno_view"></h4>
                <h4 class="email_view"></h4>
                <h4 class="org_view"></h4>
                <h4 class="uname_view"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade modal-lg" id="Tailor_EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tailor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-message">

                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <input type="hidden" class="form-control" id="id_edit" name="id" />
                        <label for="" class="form-label">Tailor Name</label>
                        <input type="text" class="form-control" id="tname_edit" name="tname" placeholder="Kirtan" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Mobile No</label>
                        <input type="number" class="form-control" id="mobno_edit" name="mobno"
                            placeholder="9995556661" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_edit" name="email"
                            placeholder="Something@gmail.com" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Organization</label>
                        <input type="text" class="form-control" id="org_edit" name="org" placeholder="Raymond" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" id="uname_edit" name="uname" placeholder="Kirtan" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tailor_update_ajax">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="Tailor_DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Tailor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="id_delete" name="id" />
                Are You Sure You want to Delete?
                <h4 class="id_view"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger tailor_delete_ajax">Delete</button>
            </div>
        </div>
    </div>
</div>

<body data-bs-theme="dark">
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#Tailor_AddModal">
            Add Tailor
        </button>
    </div>
    <div class="message-show">

    </div>
    <div class="table-responsive">
        <table class="table table-default">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tailor Name</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="studentdata">

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>


</body>

</html>
<script>
$(document).ready(function() {
    getdata();

    $(document).on("click", ".viewbtn", function() {
        var tailorid = $(this).closest('tr').find('.tailor_id').text();
        $.ajax({
            type: "POST",
            url: "ajax-crud/add.php",
            data: {
                'checking_edit': true,
                'tailorId': tailorid
            },
            success: function(response) {
                $.each(response, function(key, value) {
                    $('.id_view').text(value['Tailor_id']);
                    $('.tname_view').text(value['Tailor_Name']);
                    $('.mobno_view').text(value['Tailor_MobileNo']);
                    $('.email_view').text(value['Tailor_Email']);
                    $('.org_view').text(value['Tailor_Org']);
                    $('.uname_view').text(value['Tailor_userName']);
                });
                $('#Tailor_ViewModal').modal('show')
            }
        });
    });

    $(document).on("click", ".editbtn", function() {
        var tailorid = $(this).closest('tr').find('.tailor_id').text();
        // alert(tailorid)
        $.ajax({
            type: "POST",
            url: "ajax-crud/add.php",
            data: {
                'checking_view': true,
                'tailorId': tailorid
            },
            success: function(response) {
                $.each(response, function(key, value) {
                    $('#id_edit').val(value['Tailor_id']);
                    $('#tname_edit').val(value['Tailor_Name']);
                    $('#mobno_edit').val(value['Tailor_MobileNo']);
                    $('#email_edit').val(value['Tailor_Email']);
                    $('#org_edit').val(value['Tailor_Org']);
                    $('#uname_edit').val(value['Tailor_userName']);
                });
                $('#Tailor_EditModal').modal('show')
            }
        });
    });

    $(document).on("click", ".delbtn", function() {
        var tailorid = $(this).closest('tr').find('.tailor_id').text();
        $('#id_delete').val(tailorid)
        $('#Tailor_DeleteModal').modal('show')
    });

    $(".tailor_delete_ajax").click(function (e) { 
        e.preventDefault();
        
        var tailorid = $('#id_delete').val()
        // alert(tailorid)
        $.ajax({
            type: "POST",
            url: "ajax-crud/add.php",
            data: {
                'checking_delete': true,
                'tailorId': tailorid
            },
            success: function(response) {
                $('#Tailor_DeleteModal').modal('hide')
                $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                          <strong>Sunno</strong> ' + response + '.\
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                $('.studentdata').html("");
                getdata();
            }
        });
    });

    $('.tailor_add_ajax').click(function(e) {
        e.preventDefault();
        var tname = $('.tname').val();
        var mobno = $('.mobno').val();
        var email = $('.email').val();
        var org = $('.org').val();
        var uname = $('.uname').val();
        var pwd = $('.pwd').val();

        if (tname != '' & mobno != "" & email != "" & org != "" & uname != "" & pwd != "") {
            $.ajax({
                type: "POST",
                url: "ajax-crud/add.php",
                data: {
                    'checking_add': true,
                    'tname': tname,
                    'mobno': mobno,
                    'email': email,
                    'org': org,
                    'uname': uname,
                    'pwd': pwd
                },
                success: function(response) {
                    $('#Tailor_AddModal').modal('hide');
                    $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                          <strong>Sunno</strong> ' + response + '.\
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                    $('.studentdata').html("");
                    getdata();
                    $('.tname').val("")
                    $('.mobno').val("")
                    $('.email').val("")
                    $('.org').val("")
                    $('.uname').val("")
                    $('.pwd').val("")
                }
            });
        } else {
            $('.error-message').append('\
                <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                  <strong>For Love Of God</strong> Please Fill All Details.\
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                </div>\
            ');
        }
    });

    $('.tailor_update_ajax').click(function(e) {
        e.preventDefault();
        var id = $('#id_edit').val();
        var tname = $('#tname_edit').val();
        var mobno = $('#mobno_edit').val();
        var email = $('#email_edit').val();
        var org = $('#org_edit').val();
        var uname = $('#uname_edit').val();
        // alert(id);

        if (tname != '' & mobno != "" & email != "" & org != "" & uname != "") {
            $.ajax({
                type: "POST",
                url: "ajax-crud/add.php",
                data: {
                    'checking_update': true,
                    'id': id,
                    'tname': tname,
                    'mobno': mobno,
                    'email': email,
                    'org': org,
                    'uname': uname
                },
                success: function(response) {
                    $('#Tailor_AddModal').modal('hide');
                    $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                          <strong>Sunno</strong> ' + response + '.\
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                        </div>\
                    ');
                    $('.studentdata').html("");
                    getdata();
                }
            });
        } else {
            $('.error-message').append('\
                <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                  <strong>For Love Of God</strong> Please Fill All Details.\
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                </div>\
            ');
        }
    });

});

function getdata() {
    $.ajax({
        type: "get",
        url: "ajax-crud/fetch.php",
        success: function(response) {
            $.each(response, function(key, value) {
                $('.studentdata').append('\
                    <tr>' +
                    '<td class="tailor_id">' + value['Tailor_id'] + '</td>\
                        <td>' + value['Tailor_Name'] + '</td>\
                        <td>' + value['Tailor_MobileNo'] + '</td>\
                        <td>' + value['Tailor_Email'] + '</td>\
                        <td>' + value['Tailor_Org'] + '</td>\
                        <td>\
                            <a href="#" class="badge bg-success viewbtn">View</a>\
                            <a href="#" class="badge bg-primary editbtn">Edit</a>\
                            <a href="#" class="badge bg-danger delbtn">Delete</a>\
                        </td>\
                    </tr>\
                ');
            });
        }
    });
}
</script>