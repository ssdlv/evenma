$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url = window.location.href;
    url = url.split("=");
    //alert(url[1]);
    //getEventByUser(url[1]);




});
