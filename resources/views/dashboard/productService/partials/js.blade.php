<script>
    $(document).ready(function(){
        $(document).on('click', '.delteProDuctService', function(){
            var serviceDeleteId = $(this).val();
            // alert(serviceDeleteId);
            $('#serviceModalDelete').modal('show');
            $('#serviceModalDeleteid').val(serviceDeleteId);
        })
    })
</script>