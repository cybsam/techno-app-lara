<div class="modal fade" id="addteammember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add team member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SupUser.OurTeamInsert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-danger">Select Department</label>
                        <select name="department" class="form-control" id="department">
                            <option value="{{ _('0') }}" selected>Select Department</option>
                            @foreach ($empSectionCategory as $key => $EmpSectionCat)
                                <option value="{{ $EmpSectionCat->id }}">{{ $EmpSectionCat->team_department }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-danger">Select Degination</label>
                        <select name="degination" class="form-control" id="degination">
                            <option value="{{ _('0') }}" selected>Select Degination</option>
                            @foreach ($empDeginationCategory as $key $empDegination)
                                <option value="{{ $empDegination->id }}">{{ $empDegination->team_department_sub }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Member Email</label>
                        <input type="email" name="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member Mobile</label>
                        <input type="text" name="number" id="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Member Image</label>
                        <input type="file" name="pro_image" id="pro_image" class="form-control">
                    </div>
                    <div class="form-group float-right mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert Member</button>
                    </div>
                    <div class="form-group pt-3"></div>
                </div>
            </form>

            

        </div>
    </div>
</div>