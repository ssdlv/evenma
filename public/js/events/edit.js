demoEdit = {
    showSwal: function(type, message, id = null){
        if(type === 'basic'){
            swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success"
            }).catch(swal.noop)

        }
        else if(type === 'success-message'){
            swal({
                title: "Successful!",
                text: message,
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
        else if(type === 'warning-message-and-confirmation'){
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
                evenma.eventDelete(id);
                swal({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                })
            }).catch(swal.noop)
        }
    },
};
evenma = {
    init : function () {
        $('#preview-title').text($('#event-title').val());
        $('#preview-desc').text($('#event-desc').val());
    },
    eventEdit : function (event) {
        $.ajax({
            url: '/events/edit',
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
                    demoEdit.showSwal(response.type, response.message);
                }else if (response.result === 'error') {
                    demo.showSwal('error-message');
                }else {
                    console.log("Warning");
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

    $(function () {
        let desc = $('#event-desc').val();
        if (desc.length >= 148){
            $('#event-desc').attr('rows','2')
        }
    });

//Preview
    //preview type
    $(document).on('change', '#change-type', function () {
        var type = $('#change-type option:selected').text();
        //$('#preview-type').text(type);
    });
    //preview title
    $(document).on('keyup', '#event-title', function () {
        var title = $('#event-title').val();
        if (title === '') {
            $('#preview-title').text('Title');
        } else {
            $('#preview-title').text(title);
        }
        //console.log(title);
    });
    //preview desc
    $(document).on('keyup', '#event-desc', function () {
        var desc = $('#event-desc').val();
        if (desc === '') {
            $('#preview-desc').text('Description');
        } else {
            desc = desc.substr(0, 149);
            $('#preview-desc').text(desc + '...');
        }
    });
    //Preview time
    $(document).on('change', '#event-time', function () {
        var time = $('#event-time').val();
        $('#preview-time').text(time);
        //console.log(type);
    });

    $('#formEditEvent').on('submit', function (e) {
        e.preventDefault();
        evenma.eventEdit(new FormData(this));
    });


});
