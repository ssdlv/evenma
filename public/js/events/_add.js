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


    $(document).on('click', '#nav-one', function () {
        $('#input-tab-pos').val(0);     $('#event-send-data').text('Next');
    });
    $(document).on('click', '#nav-two', function () {
        $('#input-tab-pos').val(1);     $('#event-send-data').text('Next');
    });
    $(document).on('click', '#nav-three', function () {
        $('#input-tab-pos').val(2);     $('#event-send-data').text('Next');
    });
    $(document).on('click', '#nav-four', function () {
        $('#input-tab-pos').val(3);     $('#event-send-data').text('Send Data');
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
            desc = desc.substr(0, 49);
            $('#preview-desc').text(desc + '...');
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

    function increment(){
        var txt = $('#event-send-data').text();
        var pos = $('#input-tab-pos').val();
        pos = parseInt(pos, 10);
        if (txt === 'Next'){
            pos++;
            $('#input-tab-pos').val(pos);
            switchPosition(pos);
        }
        else if (txt === 'Send Data') {
            addEvent();
        }
        if (pos === 3){
            $('#event-send-data').text('Send Data');
        }else {
            $('#event-send-data').text('Next');
        }

        console.log(pos);
    }
    setFormValidation('#add-event-form', rules);
    function setFormValidation(id, rules){
        $(id).validate({
            rules: rules,
            submitHandler: function (form) {
                increment();
                /*alert('valid form submitted ');
                return false;*/
            },
            errorPlacement: function(error, element) {
                $(element).closest('div').addClass('has-error');
            }
        });
    }
//Send data
    function addEvent() {
        var event = {
            'title':$('#event-title').val(),
            'desc':$('#event-desc').val(),
            'type':$('#change-type').val(),
            'city':$('#change-city').val(),
            'location':$('#event-location').val(),
            'time':$('#event-time').val(),
            'date':$('#add-time-start').val(),
            'file':$('#event-image').val(),
            'web':$('#event-web-site').val(),
            'facebook':$('#event-facebook').val(),
            'instagram':$('#event-instagram').val(),
        };
        eAdd(event);
        //console.log(event);
    }


});
