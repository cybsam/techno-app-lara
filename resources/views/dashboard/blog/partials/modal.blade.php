{{-- delete modal start --}}
<div class="modal fade" id="DeleteBlogServiceModalsh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUserBlog.delete') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger">
                    <div class="form-group">
                        <b class="text-white">Are you sure to delete this Blog! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="DeleteBlogServiceId" id="DeleteBlogServiceId" placeholder="">
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
{{-- delete modal end --}}
