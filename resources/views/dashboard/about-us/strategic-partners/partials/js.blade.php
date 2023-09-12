<script>
    $(document).ready(function(){
        $(document).on('click','.strategicModalDelete', function(){
            var starategicPartnersId = $(this).val();
            $('#strategicModalDeleteShow').modal('show');
            $('#strategicModalDeleteId').val(starategicPartnersId);
        })
    })
</script>