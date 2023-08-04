<script>
    $(document).ready(function(){
        {{--
        $(document).on('click','#banner_upload',function(e){
            e.preventDefault();
            let title = $('#title').val();
            let image = $('#image').val();

            $.ajax({
                type:"get",
                dataType: "json",
                enctype: 'multipart/form-data',
                url: "",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'title':title, 'image':image}
            });
        }) --}}

        //Set Active Switch
        $(document).on('click','.is_active_switch',function(){
            var id = $(this).data('id'); 
            var status = $(this).prop('checked') == true ? 1 : 0; 
 
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'status': status, 'id': id},
                success: function(data){
                    $('.table').load(location.href+' .table');
                    console.log(data.success)
                }
            })

        });
        //Set Head Switch
        $(document).on('click','.is_head_switch',function(){
            var id = $(this).data('id'); 
            var status = $(this).prop('checked') == true ? 1 : 0; 
 
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'status': status, 'id': id},
                success: function(data){
                    $('.table').load(location.href+' .table');

                }
            })

        })
    // Update data to modal
    $('#updateModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var title = button.data('title');
            var description = button.data('description');

            var modal = $(this)

            modal.find('.modal-body #up_id').val(id);
            modal.find('.modal-body #up_title').val(title);
            modal.find('.modal-body #up_description').val(description);
        });
        
        // Delete data to modal
        $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id');
        
                var modal = $(this)
    
                modal.find('.modal-body #del_id').val(id);
            });

    });
    
</script>
<script>
    $(function () {
      $("#dataTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>