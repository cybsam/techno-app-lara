
<div class="modal fade concernModal" id=""  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Concern</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body">
                <form action="{{ route('SupUser.OurConcernBckInsert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <span>Concern Name</span>
                        <input type="text" class="form-control" name="concern_name" value="{{ old('concern_name') }}" id="concern_name">
                        <div class="text-danger">
                            @error('concern_name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Concern Image</span>
                        <input type="file" class="form-control" name="concern_image" id="concern_image">
                        <div class="text-danger">
                            @error('concern_image')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Concern Description</span>
                        <textarea name="concern_description" class="form-control" id="summernote" cols="" rows=""></textarea>
                        <div class="text-danger">
                            @error('concern_description')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="button-group">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button class="btn btn-primary" type="submit">Insert Concern</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
