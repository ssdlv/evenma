evenma = {
    eAdd: function (event) {
        $.ajax({
            url: '/events/add',
            type: 'post',
            enctype: 'multipart/form-data',
            data: event,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                spinner('loading','#add-event-form','Finish');
            },
            success: function(response){
                console.log(response);
                if (response.result === 'success') {
                    demo.showSwal('success-message');
                }
                else if (response.result === 'error') {
                    demo.showSwal('error-message');
                }
                else {
                    console.log("Warning");
                }
            }
        }).done(function() {
            spinner('init','#add-event-form');
            //$('#formAddEvent').trigger("reset");
        })/*.fail(function() {
            alert('Server not responding...');
        })*/;
    },
    ePublish : function (event) {
        $.ajax({
            url: '/events/publish',
            type: 'get',
            data:{event:event},
            dataType: 'json',
            success: function(response){
                //console.log(response);
                //getEventByUser();
            }
        });
    },
    eDelete : function (event) {
        $.ajax({
            url: '/events/delete',
            type: 'get',
            data:{event:event},
            dataType: 'json',
            success: function(response){
                //console.log(response);
            }
        });
    },
    eAll : function () {

    },
    eAddView : function (event) {
        $.ajax({
            url: '/views/add',
            type: 'get',
            data:{event:event},
            dataType: 'json',
            success: function(response){
                //console.log(response);
            }
        });
    },
    eAllPubWait : function () {

    },
    eByUser : function (user) {
        $.ajax({
            url: '/profile',
            type: 'get',
            data:{user:user},
            dataType: 'json',
            success: function(response){
                //console.log(response);
                //toastAlert(response.title, response.message, response.result);
                var publish = ''; var n_publish = ''; var count_publish = 0; var count_not_publish = 0;
                $.each(response['publish'], function (key, value) {
                    publish = publish + '<div class="col-md-6">\n' +
                        '                                        <div class="card card-background" style="background-image: url(\''+value.event-image+'\')">\n' +
                        '                                            <div class="dropdown">\n' +
                        '                                                <a id="closeBar" class=" nav-link" data-toggle="dropdown">\n' +
                        '                                                    <i class="material-icons">more_horiz</i>\n' +
                        '                                                </a>\n' +
                        '                                                <div class="dropdown-menu dropdown-with-icons">\n' +
                        '                                                    <a href="/details/'+value.event_id+'" class="dropdown-item">\n' +
                        '                                                        <i class="material-icons">visibility</i> View\n' +
                        '                                                    </a>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                            <a href="javascript:void(0)"></a>\n' +
                        '                                            <div class="card-body">\n' +
                        '                                                <label class="badge badge-warning">'+value.type_name+'</label>\n' +
                        '                                                <a href="javascript:void(0)">\n' +
                        '                                                    <h4 class="card-title">'+value.event_title+'</h4>\n' +
                        '                                                </a>\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>';
                    count_publish++;
                }); $('#list-event-publish').html(publish); $('#count-publish').text(count_publish);
                $.each(response['not'], function (key, value) {
                    n_publish = n_publish + '<div class="col-md-6">\n' +
                        '                                        <div class="card card-background" style="background-image: url('+value.event-image+')">\n' +
                        '                                            <div class="dropdown">\n' +
                        '                                                <a id="closeBar" class=" nav-link" data-toggle="dropdown">\n' +
                        '                                                    <i class="material-icons">more_horiz</i>\n' +
                        '                                                </a>\n' +
                        '                                                <div class="dropdown-menu dropdown-with-icons">\n' +
                        '                                                    <a href="/details/'+value.event_id+'" class="dropdown-item">\n' +
                        '                                                        <i class="material-icons">visibility</i> View\n' +
                        '                                                    </a>\n' +
                        '                                                    <a href="/edit?event='+value.event_id+'" class="dropdown-item">\n' +
                        '                                                        <i class="material-icons">edit</i> Edit\n' +
                        '                                                    </a>\n' +
                        '                                                    <a id="event-delete-link" data-id="'+value.event_id+'" href="javascript:void(0)" class="dropdown-item">\n' +
                        '                                                        <i class="material-icons">delete</i> Delete\n' +
                        '                                                    </a>\n' +
                        '                                                    <a id="event-publish-link" data-id="'+value.event_id+'" href="javascript:void(0)" class="dropdown-item">\n' +
                        '                                                        <i class="material-icons">send</i> Publish\n' +
                        '                                                    </a>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                            <a href="javascript:void(0)"></a>\n' +
                        '                                            <div class="card-body">\n' +
                        '                                                <label class="badge badge-danger">'+value.type_name+'</label>\n' +
                        '                                                <a href="javascript:void(0)">\n' +
                        '                                                    <h4 class="card-title">'+value.event_title+'</h4>\n' +
                        '                                                </a>\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>';
                    count_not_publish++;
                }); $('#list-event-not-publish').html(n_publish); $('#count-not-publish').text(count_not_publish);
            }
        });
    },
    eTypes : function (id = '#change-city') {
        $.ajax({
            url: '/types/all',
            type: 'get',
            //data:{event:event},
            dataType: 'json',
            success: function(response){
                //console.log(response);
                var rows = '';
                rows = rows + '<option value="0" >Choose Your Type Event</option>';
                $.each(response, function (key, value) {
                    rows = rows + '<option value="'+value.id+'">'+value.type_name+'</option>';
                });
                $(id).html(rows);
            }
        });
    },
    eCities : function (id = '#change-type') {
        $.ajax({
            url: '/cities/all',
            type: 'get',
            //data:{event:event},
            dataType: 'json',
            success: function(response){
                var rows = '';
                rows = rows + '<option value="0">Choose Your City</option>';
                $.each(response, function (key, value) {
                    rows = rows + '<option value="'+value.id+'">'+value.city_name+'</option>';
                });
                $(id).html(rows);
            }
        });
    },
};
$(document).ready(function () {
    let token = $('meta[name="csrf-token"]').attr('content');
});
function toastAlert(title, message, type) {
    toastr[type](message, title);
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "15000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}
function spinner(t = 'loading', element = '#load-more-event', text = 'Load more...') {
    var spinner = '';
    if (t == 'loading'){
        spinner = '<div id="load-spinner" class="lds-spinner">\n' +
            '                                        <div></div><div></div><div></div><div></div><div></div><div></div>\n' +
            '                                        <div></div><div></div><div></div><div></div><div></div><div></div>\n' +
            '                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading...';
    }else{
        spinner = text;
    }
    $(element).html(spinner);
}
function events(city, type, search, start = 0, end = 0, page = 1, nature = 0) {
    $.ajax({
        url: '/events/all',
        type: 'get',
        data:{city:city, type:type, search:search, start:start, end:end, page:page, nature:nature},
        dataType: 'json',
        beforeSend: function(){
            spinner();
        },
        success: function(response){
            //console.log(response);
            var rows = '';  var rows_premium = '';   var count = 0;
            if (response[0].length >= 1){
                $.each(response[0], function (key, value) {
                    if (nature === 0) {
                        if (count < 3){
                            rows_premium = rows_premium + '<div class="col-lg-4 col-md-6">\n' +
                                '                                    <div class="card card-product">\n' +
                                '                                        <div class="card-header card-header-image">\n' +
                                '                                            <a href="/details/'+value.event_id+'" data-id="'+value.event_id+'" class="add-view">\n' +
                                '                                                <img class="img" src="/files/events/'+value.event_image+'">\n' +
                                '                                            </a>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="card-body">\n' +
                                '                                            <h6 class="card-category text-info">'+value.type_name+'</h6>\n' +
                                '                                            <h4 class="card-title">\n' +
                                '                                                <a href="/details/'+value.event_id+'" data-id="'+value.event_id+'" class="add-view">'+value.event_title+'</a>\n' +
                                '                                            </h4>\n' +
                                '                                            <p class="card-description">'+value.event_desc+'</p>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="card-footer ">\n' +
                                '                                            <div class="stats m-sm-auto">' +
                                '             <i class="material-icons">room</i> '+value.city_name+
                                '                                            </div>\n' +
                                '                                            <div class="stats ml-auto">\n' +
                                '                                                <i class="material-icons">alarm</i> '+value.event_start+'\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                </div>';
                            count++;
                        }
                        else {
                            rows = rows + '<div class="col-lg-4 col-md-6">\n' +
                                '                                    <div class="card card-product">\n' +
                                '                                        <div class="card-header card-header-image">\n' +
                                '                                            <a href="/details/'+value.event_id+'" data-id="'+value.event_id+'" class="add-view">\n' +
                                '                                                <img class="img" src="/files/events/'+value.event_image+'">\n' +
                                '                                            </a>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="card-body">\n' +
                                '                                            <h6 class="card-category text-info">'+value.type_name+'</h6>\n' +
                                '                                            <h4 class="card-title">\n' +
                                '                                                <a href="/details/'+value.event_id+'" data-id="'+value.event_id+'" class="add-view">'+value.event_title+'</a>\n' +
                                '                                            </h4>\n' +
                                '                                            <p class="card-description">'+value.event_desc+'</p>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="card-footer ">\n' +
                                '                                            <div class="stats ml-auto">' +
                                '<i class="material-icons">room</i> '+value.city_name+
                                '                                            </div>\n' +
                                '                                            <div class="stats ml-auto">\n' +
                                '                                                <i class="material-icons">schedule</i> '+value.event_start+'\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                </div>';
                        }
                    }
                    else {
                        rows = rows + '<div class="col-lg-4 col-md-6">\n' +
                            '                                    <div class="card card-product">\n' +
                            '                                        <div class="card-header card-header-image">\n' +
                            '                                            <a href="/details/'+value.event_id+'" data-id="'+value.event_id+'" class="add-view">\n' +
                            '                                                <img class="img" src="/files/events/'+value.event_image+'">\n' +
                            '                                            </a>\n' +
                            '                                        </div>\n' +
                            '                                        <div class="card-body">\n' +
                            '                                            <h6 class="card-category text-info">'+value.type_name+'</h6>\n' +
                            '                                            <h4 class="card-title">\n' +
                            '                                                <a href="/details/'+value.event_id+' data-id="'+value.event_id+'" class="add-view">'+value.event_title+'</a>\n' +
                            '                                            </h4>\n' +
                            '                                            <p class="card-description">'+value.event_desc+'</p>\n' +
                            '                                        </div>\n' +
                            '                                        <div class="card-footer ">\n' +
                            '                                            <div class="author">\n' +
                            '                                                <a href="javascript:void()">\n' +
                            '                                                    <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">\n' +
                            '                                                    <span>Mike John</span>\n' +
                            '                                                </a>\n' +
                            '                                            </div>\n' +
                            '                                            <div class="stats ml-auto">\n' +
                            '                                                <i class="material-icons">schedule</i> '+value.event_start+'\n' +
                            '                                            </div>\n' +
                            '                                        </div>\n' +
                            '                                    </div>\n' +
                            '                                </div>';
                    }
                });
                if (nature === 0){
                    $('#list-events').html(rows);
                    $('#list-premium-events').html(rows_premium);
                }
                else {
                    //rows = rows_premium;
                    //$('#list-events').append(rows_premium);
                    $('#list-events').append(rows);
                    //console.log(rows_premium);
                }
            }else {
                $('#not-found-data').text('Not found data !');
            }
            /*if (nature === 0){
                $('#list-events').html(rows);
                $('#list-premium-events').html(rows_premium);
            }else {
                $('#list-events').append(rows);
                //$('#list-premium-events').html(rows_premium);
            }*/
        },
    }).done(function() {
        //$('#titleh3').addClass("text-danger");
        spinner('init');
    }).fail(function() {
        alert('Server not responding...');
    });
}
function getEventByUser(user){
    $.ajax({
        url: '/profile',
        type: 'get',
        data:{user:user},
        dataType: 'json',
        success: function(response){
            //console.log(response);
            //toastAlert(response.title, response.message, response.result);
            var publish = ''; var n_publish = ''; var count_publish = 0; var count_not_publish = 0;
            $.each(response['publish'], function (key, value) {
                publish = publish + '<div class="col-md-6">\n' +
                    '                                        <div class="card card-background" style="background-image: url(\''+value.event-image+'\')">\n' +
                    '                                            <div class="dropdown">\n' +
                    '                                                <a id="closeBar" class=" nav-link" data-toggle="dropdown">\n' +
                    '                                                    <i class="material-icons">more_horiz</i>\n' +
                    '                                                </a>\n' +
                    '                                                <div class="dropdown-menu dropdown-with-icons">\n' +
                    '                                                    <a href="/details/'+value.event_id+'" class="dropdown-item">\n' +
                    '                                                        <i class="material-icons">visibility</i> View\n' +
                    '                                                    </a>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                            <a href="javascript:void(0)"></a>\n' +
                    '                                            <div class="card-body">\n' +
                    '                                                <label class="badge badge-warning">'+value.type_name+'</label>\n' +
                    '                                                <a href="javascript:void(0)">\n' +
                    '                                                    <h4 class="card-title">'+value.event_title+'</h4>\n' +
                    '                                                </a>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>';
                count_publish++;
            });
            $('#list-event-publish').html(publish); $('#count-publish').text(count_publish);
            $.each(response['not'], function (key, value) {
                n_publish = n_publish + '<div class="col-md-6">\n' +
                    '                                        <div class="card card-background" style="background-image: url('+value.event-image+')">\n' +
                    '                                            <div class="dropdown">\n' +
                    '                                                <a id="closeBar" class=" nav-link" data-toggle="dropdown">\n' +
                    '                                                    <i class="material-icons">more_horiz</i>\n' +
                    '                                                </a>\n' +
                    '                                                <div class="dropdown-menu dropdown-with-icons">\n' +
                    '                                                    <a href="/details/'+value.event_id+'" class="dropdown-item">\n' +
                    '                                                        <i class="material-icons">visibility</i> View\n' +
                    '                                                    </a>\n' +
                    '                                                    <a href="/edit/'+value.event_id+'" class="dropdown-item">\n' +
                    '                                                        <i class="material-icons">edit</i> Edit\n' +
                    '                                                    </a>\n' +
                    '                                                    <a id="event-delete-link" data-id="'+value.event_id+'" href="javascript:void(0)" class="dropdown-item">\n' +
                    '                                                        <i class="material-icons">delete</i> Delete\n' +
                    '                                                    </a>\n' +
                    '                                                    <a id="event-publish-link" data-id="'+value.event_id+'" href="javascript:void(0)" class="dropdown-item">\n' +
                    '                                                        <i class="material-icons">send</i> Publish\n' +
                    '                                                    </a>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                            <a href="javascript:void(0)"></a>\n' +
                    '                                            <div class="card-body">\n' +
                    '                                                <label class="badge badge-danger">'+value.type_name+'</label>\n' +
                    '                                                <a href="javascript:void(0)">\n' +
                    '                                                    <h4 class="card-title">'+value.event_title+'</h4>\n' +
                    '                                                </a>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>';
                count_not_publish++;
            });
            $('#list-event-not-publish').html(n_publish); $('#count-not-publish').text(count_not_publish);
        }
    });
}
function getEvents(url, nature = 0, page = 1, city = 0, type = 0, search = '') {
    $.ajax({
        url: url,
        type: 'get',
        data:{nature:nature, page:page,city:city,type:type,search:search},
        dataType: 'json',
        success: function(response){
            console.log(response);
            let rows = '';
            if (response['events'].length >= 1){
                $.each(response['events'], function (key, value) {
                    rows = rows +
                        '<div class="col-md-4">\n' +
                        '                    <div class="card card-product">\n' +
                        '                        <div class="card-image" data-header-animation="true">\n' +
                        '                            <a href="details/'+value.event_id+'">\n' +
                        '                                <img class="img" src="'+value.event_image+'">\n' +
                        '                            </a>\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="card-content">\n' +
                        '                            <div class="card-actions">\n' +
                        '                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">\n' +
                        '                                    <i class="material-icons">build</i> Fix Header!\n' +
                        '                                </button>\n' +
                        '\n' +
                        '                                <button onclick="location.href=\'/details/'+value.event_id+'" type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">\n' +
                        '                                    <i class="material-icons">remove_red_eye</i>\n' +
                        '                                </button>\n' +
                        '                                <button onclick="location.href=\'/details/'+value.event_id+'" type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">\n' +
                        '                                    <i class="material-icons">edit</i>\n' +
                        '                                </button>\n' +
                        '                                <button type="button" onclick="location.href=\'/promote/'+value.event_id+'\'" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Promote">\n' +
                        '                                    <i class="material-icons">stars</i>\n' +
                        '                                </button>\n' +
                        '                            </div>\n' +
                        '\n' +
                        '                            <h4 class="card-title">\n' +
                        '                                <a href="#pablo">'+value.event_title+'</a>\n' +
                        '                            </h4>\n' +
                        '                            <div class="card-description">'+value.event_desc+'</div>\n' +
                        '                        </div>\n' +
                        '                        <div class="card-footer">\n' +
                        '                            <div class="stats pull-left">\n' +
                        '                                <!--h4 id="preview-date">$899/night</h4-->\n' +
                        '                                <p id="preview-date" class="category">\n' +
                        '                                    <i class="material-icons">room</i> '+value.city_name +
                        '                                </p>\n' +
                        '                            </div>\n' +
                        '                            <div class="stats pull-right">\n' +
                        '                                <p id="preview-time" class="category">\n' +
                        '                                    <i class="material-icons">alarm</i> '+value.event_start +
                        '                                </p>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                </div>';
                });
                if (nature === 0){
                    $('#list-events').html(rows);
                }else {
                    $('#list-events').append(rows);
                }
            }
            else {
                $('#not-found-data').text('Not found data !');
            }


        }
    });
}
function addView(event) {
    $.ajax({
        url: '/views/add',
        type: 'get',
        data:{event:event},
        dataType: 'json',
        success: function(response){
            //console.log(response);
        }
    });
}
function getCities(id = '#change-city') {
    $.ajax({
        url: '/cities/all',
        type: 'get',
        //data:{event:event},
        dataType: 'json',
        success: function(response){
            var rows = '';
            rows = rows + '<option value="0">Choose Your City</option>';
            $.each(response, function (key, value) {
                rows = rows + '<option value="'+value.id+'">'+value.city_name+'</option>';
            });
            $(id).html(rows);
        }
    });
}
function getTypes(id = '#change-type') {
    $.ajax({
        url: '/types/all',
        type: 'get',
        //data:{event:event},
        dataType: 'json',
        success: function(response){
            //console.log(response);
            var rows = '';
            rows = rows + '<option value="0" >Choose Your Type Event</option>';
            $.each(response, function (key, value) {
                rows = rows + '<option value="'+value.id+'">'+value.type_name+'</option>';
            });
            $(id).html(rows);
        }
    });
}
function publish(event){
    $.ajax({
        url: '/events/publish',
        type: 'get',
        data:{event:event},
        dataType: 'json',
        success: function(response){
            toastAlert(response.title, response.message, response.result);
            getEventByUser();
        }
    });
}
function eDelete(event){
    $.ajax({
        url: '/events/delete',
        type: 'get',
        data:{event:event},
        dataType: 'json',
        success: function(response){
            toastAlert(response.title, response.message, response.result);
        }
    });
}
function eAdd(event){
    //var title = event['title'];
    console.log(event);
    $.ajax({
        url: '/events/add',
        type: 'post',
        enctype: 'multipart/form-data',
        data: event,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(response){
            //console.log(response);
            if (response.result === 'success') {
                demo.showSwal('success-message','Your Event has been build');
            }
        }
    });
}

//Functions DateRangePicker
    //add
    $(function() {

        var start = moment();
        var end = moment();

        function cb(start, end) {
            //format 'MMMM D, YYYY'
            $('#event-date span').html(start.format('D MMMM YYYY'));
            $('#preview-date').html(start.format('D MMM YYYY'));
            start = new Date(start);
            end = new Date(end);
            //console.log(start);
            start = start.getTime();
            end = end.getTime();
            $('#add-time-end').val(end);
            $('#add-time-start').val(start);
        }

        $('#event-date').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                //'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                //'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                //'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                //'This Month': [moment().startOf('month'), moment().endOf('month')],
                //'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    //alert(end);
    });
    //get
    $(function() {

        /*var start = moment().subtract(15, 'days');
        var end = moment().add(15, 'days');*/
        var start = moment().subtract(29, 'days');
        var end = moment().add(1, 'days');

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            start = new Date(start);
            end = new Date(end);
            //console.log(start);
            start = start.getTime();
            end = end.getTime();
            $('#time-end').val(end);
            $('#time-start').val(start);
            var city = $('#change-city').val();
            var type = $('#change-type').val();
            var search = $('#search').val();
            //console.log(city,type);
            /*console.log('start => ', start);
            console.log('end => ', end);*/
            //events(city, type, start, end);
            events(city, type, search, start, end, 1,0);
            //console.log(city, type, search, start, end, 1,0);
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    //alert(end);
    });
    /*$(function() {
        $('input[name="event-date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        }, function(start, end, label) {
            var years = moment().diff(start, 'years');
            console.log(years);
            //alert("You are " + years + " years old!");
    });
});*/

function setDate(launchTime, nowTime, days, hours, $minutes, seconds){
    var launch = new Date(launchTime);
    var now = new Date(nowTime);
    //alert(launch + now);
    var s = (launch.getTime() - now.getTime())/1000;

    var d = Math.floor(s/86400);
    s -= d * 86400;
    //days

    var h = Math.floor(s/3600);
    s -= h * 3600;
    //hours

    var m = Math.floor(s/60);
    s -= m * 60;
    //minutes

    s = Math.floor(s);
    //seconds;

    setTimeout(setDate, 1000);
}

jQuery( document ).ready(function( $ ) {

});
