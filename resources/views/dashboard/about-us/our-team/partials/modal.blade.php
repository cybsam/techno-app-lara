<div class="modal fade" id="addteammember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add team member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Select Department</label>
                        <select name="" class="form-control" id="">
                            <option value="" selected>Select Department</option>
                            <option value="">Support Team Electrical & Maintenance</option>
                            <option value="">Information Technology & Design</option>
                            <option value="">Business Development</option>
                            <option value="">Admin & Operation</option>
                            <option value="">Project Engineering & Operation Department</option>
                            <option value="">Management</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Degination</label>
                        <select name="" class="form-control" id="">
                            <option value="" selected>Select Degination</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Member Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member Mobile</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member WhatsApp</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member Image</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div>
