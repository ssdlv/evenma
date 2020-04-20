$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let token = $('meta[name="csrf-token"]').attr('content');
    //alert(token);
    //var csrftoken = jQuery("[name=csrfmiddlewaretoken]").val();

    /*var pageURL = window.location.href;
    var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
    alert("previous url is: " + lastURLSegment);*/
    var page = 1;
    var city = $('#change-city').val();
    var type = $('#change-type').val();
    var start = $('#time-start').val();
    var end = $('#time-end').val();
    var search = $('#search').val();

    //console.log(city,type);

    var span = $('#span-date').text();
    getCities();
    $(document).on('change','#change-city', function () {
        var city = $('#change-city').val();
        var type = $('#change-type').val();
        var start = $('#time-start').val();
        var end = $('#time-end').val();
        var search = $('#search').val();
        page = 1;
        events(city, type, search, start, end, page,0);
        //console.log(city, type, start, end);
    });
    getTypes();
    $(document).on('change','#change-type', function () {
        var type = $('#change-type').val();
        var city = $('#change-city').val();
        var start = $('#time-start').val();
        var end = $('#time-end').val();
        var search = $('#search').val();
        page = 1;
        events(city, type, search, start, end, page,0);
        //console.log(city, type, start, end);
    });

    //Publish Event
    $(document).on('click','#event-publish-link', function () {
        var event = $(this).data('id');
        publish(event);
        //alert(event);
    });
    //Delete Event
    $(document).on('click','#event-delete-link', function () {
        var event = $(this).data('id');
        eDelete(event);
    });

    events(city, type, search, start, end,1,0);

    //Add View Event
    $(document).on('click','.add-view', function () {
        var event = $(this).data('id');
        //confirm("Hello"+event);
        addView(event);
    });

    //Load
    $(document).on('click','#load-more-event', function () {
        var type = $('#change-type').val();
        var city = $('#change-city').val();
        var start = $('#time-start').val();
        var end = $('#time-end').val();
        var search = $('#search').val();
        page++;
        //console.log(city, type, search, start, end,page);
        events(city, type, search, start, end, page,1);
    });

    //KeyUP
    $(document).on('keyup','#search', function () {
        var type = $('#change-type').val();
        var city = $('#change-city').val();
        var start = $('#time-start').val();
        var end = $('#time-end').val();
        var search = $('#search').val();
        console.log(city, type, search, start, end);
        events(city, type, search, start, end, page,0);
    });
    //var page = 1;
    /*var height = $(document).height() - 500;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= height) {
            page++;
            //loadMoreData(page);
            events(city, type, start, end, page,1);
        }
    });*/

    testDate();
    function testDate() {
        //alert("h");
        var server = ((1574878870 + (86400 * 3))*1000);
        var launch = new Date(2019, 12, 30, 23, 59, 59);
        var now = new Date();
        //alert(launch + now);
        var s = (launch.getTime() - now.getTime())/1000;
        var d = Math.floor(s/86400);
        s -= d * 86400;
        var h = Math.floor(s/3600);
        s -= h * 3600;
        var m = Math.floor(s/60);
        s -= m * 60;
        s = Math.floor(s);
        var result = d +'jrs ' + h + 'hrs ' + m + 'min '+ s + 'secs';
        d = d + ' jr'; h = h + ' hr'; m = m + ' min'; s = s + 'sec';
        if (d > 1)
            d = d + ' jrs';
        if (h > 1)
            h = h + ' hrs';
        if (m > 1)
            m = m + ' min';
        if (s > 1)
            s = s + ' secs';
        $("#days").html(d);
        $("#hours").html(h);
        $("#minutes").html(m);
        $("#seconds").html(s);
        console.log(result);
        //return result;
        //$("#titleh3").html(result);
        //setTimeout(testDate, 1000);
    }

});
