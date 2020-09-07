evenma = {
    eLast : function () {
        $.ajax({
            url: '/events/publish/last',
            type: 'get',
            dataType: 'json',
            success: function(response){
                //console.log(response);
                let rows = '';
                $.each(response, function (key, value) {
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
                        '                                <button onclick="location.href=\'/details/'+value.event_id+'\'" type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">\n' +
                        '                                    <i class="material-icons">remove_red_eye</i>\n' +
                        '                                </button>\n' +
                        '                                <button onclick="location.href=\'/details/'+value.event_id+'\'" type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">\n' +
                        '                                    <i class="material-icons">edit</i>\n' +
                        '                                </button>\n' +
                        '                                <!--button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">\n' +
                        '                                    <i class="material-icons">close</i>\n' +
                        '                                </button-->\n' +
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
                $('#list-event-last').html(rows);
            }
        });
    },
    eStat : function () {
        $.ajax({
            url: '/events/stats',
            type: 'get',
            //data:{event:event},
            dataType: 'json',
            success: function(response){
                //console.log(response[0].publish);
                let row = '';
                $('#count-event-publish').text(response[0].publish);
                $('#count-event-publish-24h').html('<i class="material-icons">queue</i> Last 24 Hours : ' + response[1].publish);

                $('#count-event-waiting').text(response[0].waiting);
                $('#count-event-waiting-24h').html('<i class="material-icons">queue</i> Last 24 Hours : ' + response[1].waiting);

                $('#count-event-view').text(342457);
                $('#count-event-view-24h').html('<i class="material-icons">queue</i> Last 24 Hours : 10697');

                //getEventByUser();
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

    evenma.eLast();

    evenma.eStat();

    //f();
    function f() {
        alert("hello")
    }

});
