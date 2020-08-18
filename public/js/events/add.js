$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




//Preview
    //preview type
    $(document).on('change', '#change-type', function () {
        let type = $('#change-type option:selected').text();
        //$('#preview-type').text(type);
    });
    //preview title
    $(document).on('keyup', '#event-title', function () {
        let title = $('#event-title').val();
        if (title === '') {
            $('#preview-title').text('Title');
        } else {
            $('#preview-title').text(title);
        }
        //console.log(title);
    });
    //preview desc
    $(document).on('keyup', '#event-desc', function () {
        let desc = $('#event-desc').val();
        console.log(desc);
        if (desc === '') {
            $('#preview-desc').text('Description');
        } else {
            if (desc.length >= 50){
                console.log(desc.length);
                $('#event-desc').attr('rows','3')
            }

            if (desc.length >= 149){
                desc = desc.substr(0, 149);
                $('#preview-desc').text(desc + '...');
            }
            else {
                $('#preview-desc').text(desc);
            }
        }
    });
    //Preview time
    $(document).on('change', '#event-time-start', function () {
        var time = $('#event-time-start').val();
        $('#preview-time').text(time);
        console.log(time);
    });

    //Preview date
    $(document).on('change', '#event-date-start', function () {
        var date = $('#event-date-start').val();
        $('#preview-date').text(date);
        date = new Date(date);
        console.log(date.getDay(),date.getMonth(), date.getFullYear());
    });


    $(document).on('click', '#add-event-form', function () {
        //alert('Form Validate!');
    });
    $('#formAddEvent').on('submit', function (e) {
        e.preventDefault();
        console.log(new FormData(this));
        //eAdd(new FormData(this));
        evenma.eAdd(new FormData(this));
    });

    $('#alert').on('click', function () {
        demo.showSwal('error-message');
        //evenma.eAdd();
    });

});
