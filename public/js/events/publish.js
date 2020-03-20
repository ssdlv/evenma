$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var page = 1;
    var url = '/publishEvent';
    var search = $('#search').val();
    var city = $('#select-city').val();
    var type = $('#select-type').val();

    getEvents(url,0,1, city, type, search);

    $(document).on('click','#load-more-event', function () {
        page++;
        var search = $('#search').val();
        var city = $('#select-city').val();
        var type = $('#select-type').val();
        //console.log(url,1,page, city, type, search);
        getEvents(url,1,page, city, type, search);
    });

    $(document).on('change','#select-type', function () {
        var search = $('#search').val();
        var city = $('#select-city').val();
        var type = $('#select-type').val();
        getEvents(url,0,1, city, type, search);
    });
    $(document).on('change','#select-city', function () {
        var search = $('#search').val();
        var city = $('#select-city').val();
        var type = $('#select-type').val();
        getEvents(url,0,1, city, type, search);
    });
    $(document).on('keyup','#search', function () {
        var search = $('#search').val();
        var city = $('#select-city').val();
        var type = $('#select-type').val();
        getEvents(url,0,1, city, type,search);
    });
    getCities('#select-city');
    getTypes('#select-type');
    /*function getCities() {
        $.ajax({
            url: '/cities/all',
            type: 'get',
            //data:{event:event},
            dataType: 'json',
            success: function(response){
                console.log(response);
                var rows = '';
                rows = rows + '<option value="0">Choose Your City</option>';
                $.each(response, function (key, value) {
                    rows = rows + '<option value="'+value.id+'">'+value.city_name+'</option>';
                });
                $('#select-city').html(rows);
            }
        });
    }*/
});
