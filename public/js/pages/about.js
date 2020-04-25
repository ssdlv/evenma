eAlert = {
    alert : function (type, title = null, message = null, icon = null) {
        if (type === 'info'){
            swal({
                title: title,
                text: message,
                icon: icon,
                button: "OK",
            });
        }

    }
};
evenma = {
    all : function (status = '') {
        $.ajax({
            url: '/about/team/all',
            type: 'get',
            data: {status:status},
            dataType: 'JSON',
            success : function (response) {
                console.log(response);
            }
        });
    },
    send : function (data) {
        $.ajax({
            url: '/contact/add',
            type: 'post',
            data: data,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                evenma.spinner();
            },
            success: function(response){
                console.log(response);
                if (response.result === 'success') {
                    eAlert.alert('info', response.title, response.message, response.result);
                }else if (response.result === 'error') {
                    eAlert.alert('info', response.title, response.message, response.result);
                }else {
                    eAlert.alert('info','Warning','Message Not Send !','warning');
                }
            }
        }).done(function() {
            evenma.spinner('init');
            $('#contact-form').trigger("reset");
        }).fail(function() {
            alert('Server not responding...');
        });
    },
    spinner : function (t = 'loading') {
        var spinner = '';
        if (t === 'loading'){
            spinner = '<div id="load-spinner" class="lds-spinner">' +
                '                                        <div></div><div></div><div></div><div></div><div></div><div></div>' +
                '                                        <div></div><div></div><div></div><div></div><div></div><div></div>' +
                '                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading...';
        }else{
            spinner = 'Contact Us';
        }
        $('#send-contact-spinner').html(spinner);
    }
};
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-form').on('submit', function (e) {
        e.preventDefault();
        evenma.send(new FormData(this));
    });

    $(document).on('click', '#send-contact', function () {
        alert('rfh');
        $('#contact-form').trigger("reset");
    });

    //evenma.all();

    all('enable');
    function all(status = '') {
        $.ajax({
            url: '/about/team/all',
            type: 'get',
            data: {status:status},
            dataType: 'JSON',
            success : function (response) {
                console.log(response);
                let teams = '';
                if (status === 'enable'){
                    $.each(response, function (key, value) {
                        teams += '<div class="col-md-3">';
                        teams += '<div class="card card-profile card-plain">';
                        teams += '<div class="card-avatar txt-center">';
                        teams += '<a href="javascript:void(0)"><img class="img rounded-circle" style="width: 130px" src="'+value.avatar+'"></a>';
                        teams += '</div>';
                        teams += '<div class="card-body txt-center">';
                        teams += '<h4 class="card-title">'+value.first_name+' '+value.last_name+'</h4>';
                        teams += '<h6 class="category text-muted">'+value.speciality+'</h6>';
                        //teams += '<p class="card-description">'+value.description+'</p>';
                        teams += '</div>';
                        teams += '<div class="card-footer justify-content-center">';
                        if (value.twitter !== null){
                            teams = teams + '<a href="'+value.twitter+'" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>';
                        }
                        if (value.facebook !== null){
                            teams = teams + '<a href="'+value.facebook+'" class="btn btn-just-icon btn-link btn-facebook"><i class="fa fa-facebook-square"></i></a>';
                        }
                        if (value.instagram !== null){
                            teams = teams + '<a href="'+value.instagram+'" class="btn btn-just-icon btn-link btn-instagram"><i class="fa fa-instagram"></i></a>';
                        }
                        if (value.linkedin !== null){
                            teams = teams + '<a href="'+value.linkedin+'" class="btn btn-just-icon btn-link btn-linkedin"><i class="fa fa-linkedin"></i></a>';
                        }
                        teams = teams + '</div></div></div>';
                    });
                    $('#list-team').html(teams)
                }
            }
        });
    }

    let h = window.history.valueOf();
    let history = window.history.length;
    console.log(h);
    $('#p1').text(history + ' pages visitées');

    //document.getElementById('p1').innerText= history.length + ' pages visitées';

//On accède aux boutons b1, b2 et b3
    let b1 = document.getElementById('b1');
    let b2 = document.getElementById('b2');
    let b3 = document.getElementById('b3');

//On définit des gestionnaires d'évènement click pour ces boutons
    b1.addEventListener('click', hgo);
    b2.addEventListener('click', hback);
    b3.addEventListener('click', hforward);

    function hgo(){
        alert(window.history.go.name);
    }
    function hback(){
        window.history.back();
    }
    function hforward(){
        window.history.forward();
    }

    function listCookies() {
        let theCookies = document.cookie.split(';');
        let aString = '';
        for (let i = 1 ; i <= theCookies.length; i++) {
            aString += i + ' ' + theCookies[i-1] + "\n";
        }
        return aString;
    }

    function navigator() {
        let object = window.navigator.geolocation;
        return   {
            'platform' : window.navigator.platform,
            'location' : window.navigator.geolocation,
            'mediaDevices' : window.navigator.mediaDevices,
        };
    }

    //console.log(listCookies());
    //console.log(navigator());
});
