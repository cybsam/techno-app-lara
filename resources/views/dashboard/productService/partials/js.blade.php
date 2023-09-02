<script>
    $(document).ready(function(){
        $(document).on('click', '.delteProDuctService', function(){
            var serviceDeleteId = $(this).val();
            // alert(serviceDeleteId);
            $('#serviceModalDelete').modal('show');
            $('#serviceModalDeleteid').val(serviceDeleteId);
        })

        $(document).on('click','.productHardDeleteBTN', function(){
            var deleteProduct = $(this).val();
            $('#archiveProdiuctDeleteMoffff').modal('show');
            $('#archiveProdiuctDeleteMoffffID').val(deleteProduct);
        })
        
        $(document).on('click','.productrestoreBTN', function(){
            var productrestoreBTN = $(this).val();
            $('#archiveProdRestoreModffff').modal('show');
            $('#archiveProdRestoreModffffID').val(productrestoreBTN);
        })
        
    })
</script>