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
                        <select name="department" class="form-control" id="">
                            <option value="{{ _('0') }}" selected>Select Department</option>
                            @foreach ($empSectionCategory as $EmpSectionCat)
                                <option value="{{ $EmpSectionCat->id }}.{{ $EmpSectionCat->idteam_department_slug }}">{{ $EmpSectionCat->team_department }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Degination</label>
                        <select name="degination" class="form-control" id="">
                            <option value="{{ _('0') }}" selected>Select Degination</option>
                            @foreach ($empDeginationCategory as $empDegination)
                                <option value="{{ $empDegination->id }}{{ _('.') }}{{ $empDegination->team_department_sub_slug }}">{{ $empDegination->team_department_sub }}</option>
                            @endforeach
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
