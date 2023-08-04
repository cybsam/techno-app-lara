
<!-- Edit Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="upate_title">Update Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="up_id">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="up_title" name="title"  aria-describedby="title">
            <small id="titleHelp" class="form-text text-muted">Title is optional.</small>
          </div>
          <div class="form-group">
            <label for="up_description">Description <span class="text-danger">*</span> </label>
            <textarea class="form-control" id="up_description" name="description" rows="5"  aria-describedby="title" ></textarea>
            <small id="titleHelp" class="form-text text-muted">Title is required.</small>
          </div>
          <div class="form-group">
            <label for="image">Banner Image <span class="text-danger">*</span> </label>
            <input type="file" class="form-control-file" id="image" name="image" aria-describedby="image" placeholder="">
            <small id="imageHelp" class="form-text text-muted">Image file is required, Supported Format is jpg, png. and Resulation (1280 x 560)</small>
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>