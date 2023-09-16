<!-- Modal -->
<div class="modal fade" id="StrategicPartnersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stretegic Partner <span style="color: red"> *</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('SupUser.OurStrategicPartnersInsertSave') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                    @csrf
                    <div class="form-group">
                        <label for="">Strategic partner name <span style="color: red"> *</span></label>
                        <input type="text" name="strategic_partners_name" value="{{ old('strategic_partners_name') }}" id="strategic_partners_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Strategic partner logo <span style="color: red"> *</span></label>
                        <input type="file" name="strategic_partners_logo" id="strategic_partners_logo" class="form-control">
                    </div>
                    <span>Partners Category <span style="color: red"> *</span></span><br>
                    <div class="input-group mb-3">
                        @php
                            $partnesCategory = DB::table('strategic_partners_categories')->get();
                        @endphp
                        <select name="strategic_partner_categroy" id="strategic_partner_categroy" class="form-control">
                            <option value="0.null">Select category </option>
                            @foreach ($partnesCategory as $key => $partnersCategoryList)
                                <option value="{{ $partnersCategoryList->strategic_partner_categroy }}">{{ $partnersCategoryList->strategic_partner_categroy }}</option>
                            @endforeach
                            
                        </select>
                        <button type="button" class="input-group-text btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertStretegicPartnersCategory">+ Category</button>
                    </div>

                    <div class="form-group">
                        <label for="">About strategic partner <span style="color: red"> *</span></label>
                        <textarea name="strategic_partners_about" id="summernote" cols="30" rows="7" class="form-control" >{{ old('strategic_partners_about') }}</textarea>
                        
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

{{-- partners category --}}
<div class="modal fade" id="insertStretegicPartnersCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stretegic Partner Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('SupUser.StrategicPartnersCategory') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                
                    @csrf
                    <div class="form-group">
                        <label for="">Strategic Partner Category <span style="color: red"></label>
                        <input type="text" name="strategic_partner_categroy" value="{{ old('strategic_partner_categroy') }}" id="strategic_partner_categroy" class="form-control">
                        <div class="text-danger">
                            @error('strategic_partner_categroy')
                                {{ $message }}
                            @enderror
                        </div>
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
{{-- end category modal --}}