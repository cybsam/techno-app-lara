<script>
    $(document).ready(function(){
        $(document).on('click','.deleteProductServiceSub', function(){
            var deleteProductService = $(this).val();
            $('#subProductServiceDelt').modal('show');
            $('#subProductServiceDeltid').val(deleteProductService);
        })
    })
</script>