<script>
    $(document).ready(function(){
        $(document).on('click','.DeleteBlogServiceModal', function(){
            var blogDeleteId = $(this).val();
            $('#DeleteBlogServiceModalsh').modal('show');
            $('#DeleteBlogServiceId').val(blogDeleteId);
        })
    })
</script>