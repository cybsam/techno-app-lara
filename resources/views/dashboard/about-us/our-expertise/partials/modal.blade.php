
<div class="modal fade expertiseModel" id=""  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Expertise</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body">
                <form action="{{ route('SupUser.OurExpertiseStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <span>Expertise Name</span>
                        <input type="text" class="form-control" name="expertise_name" value="{{ old('expertise_name') }}" id="concern_name">
                        <div class="text-danger">
                            @error('expertise_name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <span>Expertise Educational</span>
                        <textarea name="expertise_description" class="form-control" id="summernote" cols="" rows=""></textarea>
                        <div class="text-danger">
                            @error('expertise_description')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="button-group">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button class="btn btn-primary" type="submit">Insert Expertise</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'Expertise Education Background...',
        tabsize: 2,
        height: 200
    });
</script>
