<script>
    $(document).ready(function(){
        $(document).on('click', '.UpdateUserFromBack', function(){
            var userBackIdFromButton = $(this).val();
            console.log(userBackIdFromButton);
            $('#userUpdateModalFromBackEnd').modal('show');
            
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: "{{ route('SupUser.OurTeamUpdate', ['user_id' => '']) }}" + userBackIdFromButton,
                
            })
        })
    })
    
</script>