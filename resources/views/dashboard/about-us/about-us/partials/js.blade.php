<script>
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