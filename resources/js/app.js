import './bootstrap';

/*$('.acceptAdmin').click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let id = $(this).data('id');
    $.ajax({
        url: '/users/update-role?id='+id,
        type: 'PUT',
        data: {
                id: id,
            _token: '{{ csrf_token() }}'
        } ,
        success: function(result) {
            console.log(result);
        }
    });
});*/
