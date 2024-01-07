<!-- Delete Modal -->
<div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="id_delete" name="id" />
                Are You Sure You want to Delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete_record">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal (Student)-->
<div class="modal fade modal-lg" id="view_stu_Modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-control id_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control fname_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Standard</label>
                        <input type="text" class="form-control standard_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Division</label>
                        <input type="text" class="form-control division_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Roll No</label>
                        <input type="text" class="form-control rollNo_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Gender</label>
                        <input type="text" class="form-control gender_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Birth Date</label>
                        <input type="text" class="form-control dob_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Mobile No</label>
                        <input type="text" class="form-control mobno_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control email_view" disabled />
                    </div>
                    <div class="col-md-6 p-2">
                        <label class="form-label">Address</label>
                        <textarea class="form-control address_view" rows="2" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>