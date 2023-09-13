<!-- Modal -->
<div class="modal fade" id="StrategicPartnersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stretegic Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('SupUser.OurStrategicPartnersInsertSave') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                    @csrf
                    <div class="form-group">
                        <label for="">strategic partner name</label>
                        <input type="text" name="strategic_partners_name" value="{{ old('strategic_partners_name') }}" id="strategic_partners_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">strategic partner logo</label>
                        <input type="file" name="strategic_partners_logo" id="strategic_partners_logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">about strategic partner</label>
                        <textarea name="strategic_partners_about" id="summernote" cols="30" rows="10" class="form-control" >{{ old('strategic_partners_about') }}</textarea>
                        
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Insert Value</button>
            </div>
        </form>
        </div>
    </div>
</div>



{{-- delete modal --}}


<div class="modal fade" id="strategicModalDeleteShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.OurStrategicPartnersDelete') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Strategic Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger text-white">
                    <div class="form-group">
                        <b class="text-white">Are you sure to delete this partner!</b>
                        <input type="hidden" class="form-control" name="strategicModalDeleteId" id="strategicModalDeleteId" placeholder="">
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

{{-- end delete modal --}}