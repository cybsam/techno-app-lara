<div class="modal fade" id="projectcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SupUser.ProjectCategoryInsert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Project Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="project_category" value="{{ old('project_category') }}" id="project_category" class="form-control">
                        <div class="text-danger">
                            @error('project_category')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="form-group float-right mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert Project Category</button>
                    </div>
                    <div class="form-group pt-3"></div>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- project archive --}}
<div class="modal fade" id="ProjectArchiveModalSh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUserProjectArchivePost') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Archive</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-warning text-white">
                    <div class="form-group">
                        <b class="text-white">Are you sure to archive this project! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="ProjectArchiveModalId" id="ProjectArchiveModalId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Archive</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end project archive --}}

{{-- delete project --}}
<div class="modal fade" id="ProjectDeleteBTNModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.projectDelteFromDb') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger text-white">
                    <div class="form-group">
                        <b class="text-white">Are you sure to Delete this project! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="ProjectDeleteBTNId" id="ProjectDeleteBTNId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end --}}

{{-- restore project --}}
<div class="modal fade" id="ProjectRestoreBTNModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.projectRestoreFromDB') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Restore</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-success">
                    <div class="form-group">
                        <b class="text-white">Are you sure to Restore this project! </b>
                        <input type="hidden" class="form-control" name="ProjectRestoreBTNId" id="ProjectRestoreBTNId" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Restore</button>
                </div>
            </form>
        </div>
    </div>
</div>