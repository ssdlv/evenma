$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /*$(document).on('change','#event-date', function () {
        var date = $(this).val();
        alert(date);
    });*/

    $(document).on('click','#pos-negative', function () {
        var pos = $('#input-tab-pos').val();
        pos = parseInt(pos, 10);
        /*if (pos === 0){
            $('#pos-negative').hide();
        }else {
            $('#pos-negative').show();
        }*/
        pos--;
        $('#input-tab-pos').val(pos);
        switchPosition(pos);
    });
    $(document).on('click','#pos-positive', function () {
        var pos = $('#input-tab-pos').val();
        pos = parseInt(pos, 10);
        /*if (pos === 3){
            $('#pos-positive').hide();
        }else {
            $('#pos-positive').show();
        }*/
        if (pos === 0){

        }
        pos++;
        $('#input-tab-pos').val(pos);
        switchPosition(pos);
        console.log(pos);
    });
    function switchPosition(pos) {
        switch (pos) {
            case 0 :{
                removeClassActive(1);
                removeClassActive(2);
                removeClassActive(3);
                $('#nav-one').addClass('active');
                $('#tab-one').addClass('active');
                break;
            }
            case 1 :{
                removeClassActive(0);
                removeClassActive(2);
                removeClassActive(3);
                $('#nav-two').addClass('active');
                $('#tab-two').addClass('active');
                break;
            }
            case 2 :{
                removeClassActive(0);
                removeClassActive(1);
                removeClassActive(3);
                $('#nav-three').addClass('active');
                $('#tab-three').addClass('active');
                break;
            }
            case 3 :{
                removeClassActive(1);
                removeClassActive(0);
                removeClassActive(2);
                $('#nav-four').addClass('active');
                $('#tab-four').addClass('active');
                break;
            }
        }
    }
    function removeClassActive(value){
        if (value === 0){
            $('#nav-one').removeClass('active');
            $('#tab-one').removeClass('active');
        }
        else if (value === 1){
            $('#nav-two').removeClass('active');
            $('#tab-two').removeClass('active');
        }
        else if (value === 2){
            $('#nav-three').removeClass('active');
            $('#tab-three').removeClass('active');
        }
        else{
            $('#nav-four').removeClass('active');
            $('#tab-four').removeClass('active');
        }
    }

//Preview
    //preview type
    $(document).on('change', '#change-type', function () {
        var type = $('#change-type option:selected').text();
        $('#preview-type').text(type);
        //console.log(type);
    });
    //preview title
    $(document).on('keyup', '#event-title', function () {
        var title = $('#event-title').val();
        if (title === ''){
            $('#preview-title').text('Title');
        }else {
            $('#preview-title').text(title);
        }
        //console.log(title);
    });
    //preview desc
    $(document).on('keyup', '#event-desc', function () {
        var desc = $('#event-desc').val();
        if (desc === ''){
            $('#preview-desc').text('Description');
        }else {
            $('#preview-desc').text(desc);
        }
    });
    //Preview time
    $(document).on('change', '#event-time', function () {
        var time = $('#event-time').val();
        $('#preview-time').text(time);
        //console.log(type);
    });

    var rules = {
        'change-type': {
            required: true,
        },
        'event-title': {
            required: true,
            minlength: 5
        },
        'event-desc': {
            required: true,
            minlength: 5
        },
        'event-date': {
            required: true,
        },
        'change-city': {
            required: true,
        },
        'event-location': {
            required: true,
        },
        'event-time': {
            required: true,
        },
        'file': {
            required: true,
        },
        'event-web-site': {
            required: true,
            url: true
        },
        'event-facebook': {
            required: true,
            url: true
        },
        'event-instagram': {
            required: true,
            url: true
        },
    };
    setFormValidation('#add-event-form', rules);

    function setFormValidation(id, rules){
        /*$('#collapseTwo').addClass("show");
        $('#collapseThree').addClass("show");
        $('#collapseFour').addClass("show");*/
        $(id).validate({
            rules: rules,
            submitHandler: function (form) {
                /*if ($('#event-location').val() == '' || $('#event-time').val() == ''){
                    $('#collapseTwo').addClass("show");
                    $('#collapseOne').removeClass("show");
                    $('#collapseThree').removeClass("show");
                    $('#collapseFour').removeClass("show");
                }
                else if ($('#file').val() == ''){
                    $('#collapseThree').addClass("show");
                    $('#collapseOne').removeClass("show");
                    $('#collapseTwo').removeClass("show");
                    $('#collapseFour').removeClass("show");
                }*/
                // for demo
                alert('valid form submitted');
                // for demo
                return false; // for demo
                var event = {
                    'title':$('#event-title').val(),
                    'desc':$('#event-desc').val(),
                    'type':$('#change-type').val(),
                    'city':$('#change-city').val(),
                    'location':$('#event-location').val(),
                    'time':$('#event-time').val(),
                    'date':$('#time-start').val(),
                    'file':$('#event-image').val(),
                };
                console.log(event);
                //eAdd(event)
            },
            errorPlacement: function(error, element) {
                $(element).closest('div').addClass('has-error');
            }
        });
    }

//Send data
    /*$(document).on('click', '#event-send-data', function () {
        //alert("m");
        //setFormValidation('#add-event-form', rules);
        var event = {
            'title':$('#event-title').val(),
            'desc':$('#event-desc').val(),
            'type':$('#change-type').val(),
            'city':$('#change-city').val(),
            'location':$('#event-location').val(),
            'time':$('#event-time').val(),
            'date':$('#add-time-start').val(),
            'file':$('#event-image').val(),
        };
        console.log(event);
        //eAdd(event)
    });*/

});
