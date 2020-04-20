variables = {
    page : 1,
    url : '/waitingEvent',
    search : $('#search').val(),
    city : $('#select-city').val(),
    type : $('#select-type').val(),
};
demoWaiting = {
    showSwal: function(type,data = null){
        if(type === 'basic'){
            swal({
                title: data['title'],
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop)
        }
        else if(type === 'success-message'){
            swal({
                title: data['title'],
                text: data['message'],
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success",
                type: "success"
            }).catch(swal.noop)
        }
        else if(type === 'error-message'){
            swal({
                title: "Successful!",
                text: message,
                buttonsStyling: false,
                confirmButtonClass: "btn btn-error",
                type: "error"
            }).catch(swal.noop)

        }
        else if(type === 'warning-delete-confirmation'){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then(function() {
                evenma.eventDelete(data['id']);
            }).catch(swal.noop)
        }
        else if(type === 'warning-edit-confirmation'){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, update it!',
                buttonsStyling: false
            }).then(function() {
                let link = '/edit?event=' + data;
                $(location).attr('href',link);
                //alert(link);
                //evenma.eventDelete(id);
                /*swal({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                })*/
            }).catch(swal.noop)
        }
        else if(type === 'warning-publish-confirmation'){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, update it!',
                buttonsStyling: false
            }).then(function() {
                evenma.eventPublish(data['id']);
            }).catch(swal.noop)
        }
    },
};
evenma = {
    vars : function () {
        variables.page++;
        //getEvents(url,1, page);
        variables.search = $('#search').val();
        variables.city = $('#select-city').val();
        variables.type = $('#select-type').val();
    },
    eventGet : function (id) {
        $.ajax({
            url: '/events/get',
            type: 'get',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                console.log(response);
            }
        });
    },
    eventAll : function (nature,page,city,type,search) {
        $.ajax({
            url: variables.url,
            type: 'get',
            data:{page:page,city:city,type:type,search:search},
            dataType: 'json',
            success: function(response){
                //console.log(response['events']);
                var rows = '';
                $.each(response['events'], function (key, value) {
                    rows = rows +
                        '<div class="col-md-4">\n' +
                        '                    <div class="card card-product">\n' +
                        '                        <div class="card-image" data-header-animation="true">\n' +
                        '                            <a href="#pablo">\n' +
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
                        '                                <button onclick="location.href=\'/details?event='+value.event_id+'\'" type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">\n' +
                        '                                    <i class="material-icons">remove_red_eye</i>\n' +
                        '                                </button>\n' +
                        '                                <button data-id="'+value.event_id+'" type="button" class="btn btn-default btn-simple btn-edit" rel="tooltip" data-placement="bottom" title="Edit">\n' +
                        '                                    <i class="material-icons">edit</i>\n' +
                        '                                </button>\n' +
                        '                                <button data-id="'+value.event_id+'" type="button" class="btn btn-success btn-simple btn-publish-event" rel="tooltip" data-placement="bottom" title="Publish">\n' +
                        '                                    <i class="material-icons">publish</i>\n' +
                        '                                </button>\n' +
                        '                                <button data-id="'+value.event_id+'" type="button" class="btn btn-danger btn-simple btn-remove btn-not-publish-event" rel="tooltip" data-placement="bottom" title="Remove">\n' +
                        '                                    <i class="material-icons">close</i>\n' +
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
                    if (response['events'].length < 1){
                        swal({
                            title: "Not found data !",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        }).catch(swal.noop)
                    }
                    $('#list-events').html(rows);
                }
                else {
                    $('#list-events').append(rows);
                    if (response['events'].length < 1){
                        swal({
                            title: "Not found data !",
                            buttonsStyling: false,
                            confirmButtonClass: "btn btn-info"
                        }).catch(swal.noop)
                    }
                }
            }
        });
    },
    eventEdit : function (id) {
        $.ajax({
            url: variables.url,
            type: 'get',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                console.log();
            }
        });
    },
    eventDelete : function (id) {
        $.ajax({
            url: '/events/delete',
            type: 'post',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                if (response.result === 'success'){
                    let data = {
                        'title' : response.title,
                        'message' : response.message,
                    };
                    demoWaiting.showSwal('success-message',data);
                    evenma.eventAll(0,variables.page, variables.city, variables.type, variables.search);
                }
            }
        });
    },
    eventPublish : function (id) {
        $.ajax({
            url: '/events/publish',
            type: 'post',
            data:{event:id},
            dataType: 'json',
            success: function(response){
                let data = {
                    'title' : response.title,
                    'message' : response.message,
                };
                if (response.result === 'success'){
                    demoWaiting.showSwal('basic',data);
                    evenma.eventAll(0,variables.page, variables.city, variables.type, variables.search);
                }
            }
        });
    },
};
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getCities('#select-city');
    getTypes('#select-type');
    evenma.eventAll(0, variables.page, variables.city, variables.type, variables.search);

    $(document).on('click','#load-more-event', function () {
        evenma.vars();
        evenma.eventAll(1, variables.page, variables.city, variables.type, variables.search);
    });

    $(document).on('change','#select-type', function () {
        evenma.vars();
        evenma.eventAll(1, variables.page, variables.city, variables.type, variables.search);
    });
    $(document).on('change','#select-city', function () {
        evenma.vars();
        evenma.eventAll(1, variables.page, variables.city, variables.type, variables.search);
    });
    $(document).on('keyup','#search', function () {
        evenma.vars();
        evenma.eventAll(1, variables.page, variables.city, variables.type, variables.search);
    });


    $(document).on('click', '.btn-remove', function (e) {
        e.preventDefault();
        let data = {
            'id' : $(this).data('id'),
        };
        demoWaiting.showSwal('warning-delete-confirmation',data);
    });
    $(document).on('click', '.btn-publish-event', function (e) {
        e.preventDefault();
        let data = {
            'id' : $(this).data('id'),
        };
        demoWaiting.showSwal('warning-publish-confirmation',data);
    });

    $(document).on('click', '.btn-view', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let link = '/details?event=' + id;
        $(location).attr('href',link);
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        //alert(id);
        demoWaiting.showSwal('warning-edit-confirmation', id);
        //evenma.eventGet(id);
        /*var link = '/edit?id=' + id;
        $(location).attr('href',link);*/
    });
});
