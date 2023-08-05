<script>
    //uddate user data to modal
    $('#updateModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var name = button.data('name');
        var username = button.data('username');
        var email = button.data('email');
        var role_int = button.data('role_int');
        var role = button.data('role');

        var modal = $(this)
        
        modal.find('.modal-body #up_id').val(id);
        modal.find('.modal-body #up_name').val(name);
        modal.find('.modal-body #up_username').val(username);
        modal.find('.modal-body #up_email').val(email);
        modal.find('.modal-body #up_role_int').val(role_int);
        modal.find('.modal-body #up_role').val(role)

        
        
    });

    //set active status
    $(document).on('click', '.is_active_switch', function(){
        var id = $(this).data('id');
        var status = $(this).prop('checked') == true ? 1 : 0;

        $.ajax({
            type: "POST",
            dataType: "json",
            url: {{ route('SupUser.UserIsActive') }},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {'status':status, 'id':id},
            success:function(data){
                $('.table').load(location.href+' .table');
                console.log(data.success)
            }
        })
    });
// delete user
    $('#deleteUser').on('show.bs.model',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id');

        $modal = $(this)

        modal.find('.modal-body #id').val(id);
})
    
</script>
<script>
    // updata admin data to model
    $('#adminUpdateModal').on('show.bs.model', function(event){
        var button = $(event.relatedTarget)
        var admin_id = button.data('admin_id');
        var admin_name = button.data('admin_name');
        var admin_username = button.data('admin_username');
        var admin_email = button.data('admin_email');
        var admin_role_int = button.data('admin_role_int');
        var admin_role = button.data('admin_role');

        var modal = $(this)

        modal.find('.modal-body #up_admin_id').val(admin_id);
        modal.find('.modal-body #up_admin_name').val(admin_name);
        modal.find('.modal-body #up_admin_username').val(admin_username);
        modal.find('.modal-body #up_admin_email').val(admin_email);
        modal.find('.modal-body #up_admin_role_int').val(admin_role_int);
        modal.find('.modal-body #up_admin_role').val(admin_role);
    })
</script>