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
