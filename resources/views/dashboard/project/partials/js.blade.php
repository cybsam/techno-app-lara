{{-- <script>
    //update modal
    $('#updateAboutUsInfo'.on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var companyName = button.data('companyName');
        var companyWebSite = button.data('companyWebSite');
        var companyEmail = button.data('companyEmail');
        var officeTime = button.data('officeTime');
        var companyHeader = button.data('companyHeader');
        var companyDescription = button.data('companyDescription');
        var companyAdd1 = button.data('companyAdd1');
        var companyAdd2 = button.data('companyAdd2');
        var companyMobile1 = button.data('companyMobile1');
        var companyMobile2 = button.data('companyMobile2');

        var modal = $(this)

        modal.find('.modal-body #up_id').val(id);

    }));
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function(){
        $('.select[name="department"]').on('change',fucntion(){
            var deptId = $(this).val();
            if(deptId){
                $.ajax({
                    url: '/en/Administrator/Our-team/Index',
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="degination"]').empty();
                        $.each(data, function(key, value){
                            #('.select[name="degination"]').append('<option value="'+key+'">'+value+'</option>')
                        })
                    }

                })
            }else{
                $('.select[name="degination"]').empty();
            }
        })
    });
</script> --}}

<script>
    $(document).ready(function(){
        $(document).on('click', '.ProjectArchiveButton', function(){
            var archiveId = $(this).val();
            $('#ProjectArchiveModalSh').modal('show');
            $('#ProjectArchiveModalId').val(archiveId);
        })
    })

    $(document).ready(function(){
        $(document).on('click','.ProjectArchiveRestoreBTN', function(){
            var RestoreProjectId = $(this).val();
            $('#ProjectRestoreBTNModal').modal('show');
            $('#ProjectRestoreBTNId').val(RestoreProjectId);
        })
    })
    $(document).ready(function(){
        $(document).on('click','.ProjectArchiveDeleteBTN', function(){
            var RestoreProjectId = $(this).val();
            $('#ProjectDeleteBTNModal').modal('show');
            $('#ProjectDeleteBTNId').val(RestoreProjectId);
        })
    })
</script>

