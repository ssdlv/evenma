demoType = {
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
                evenma.typeDelete(id);
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
    typeGet : function (id) {
        $.ajax({
            url: '/types/get',
            type: 'get',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                //console.log(response);
                $('#event-type-edit-id').val(response[0].id);
                $('#event-type-edit-designated').val(response[0].type_name);
            }
        });
    },
    typeAll : function () {
        $.ajax({
            url: '/types/all',
            type: 'get',
            //data:{id:id},
            dataType: 'json',
            success: function(response){
                //console.log(response);
                var rows = '';
                $.each(response, function (key, value) {
                    rows = rows + '<tr>';
                    rows = rows + '<td class="text-center">'+value.id+'</td>';
                    rows = rows + '<td class="text-center">'+value.type_name+'</td>';
                    rows = rows + '<td class="text-center">'+value.type_using+'</td>';
                    rows = rows + '<td class="text-center">'+value.type_created+'</td>';
                    rows = rows + '<td class="text-center">'+value.type_updated+'</td>';
                    rows = rows + '<td class="td-actions text-right">\n' +
                        '   <button data-toggle="modal" data-target="#viewTypeModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn btn-info btn-simple">\n' +
                        '          <i class="material-icons">person</i>\n' +
                        '                          </button>\n' +
                        '    <button data-toggle="modal" data-target="#editTypeModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn-edit btn btn-success btn-simple">\n' +
                        '           <i class="material-icons">edit</i>\n' +
                        '    </button>\n' +
                        '    <button data-toggle="modal" data-target="#deleteTypeModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn-delete btn btn-danger btn-simple">\n' +
                        '           <i class="material-icons">close</i>\n' +
                        '    </button>\n' +
                        '</td>';
                    rows = rows + '</tr>';
                });
                $('#typesTable').html(rows);

            }
        });
    },
    typeAdd : function (designated) {
        $.ajax({
            url: '/types/add',
            type: 'post',
            data:{designated:designated},
            dataType: 'json',
            success: function(response){
                console.log(response);
                if (response.result === 'success'){
                    $('#addTypeModal').modal('hide');
                    evenma.typeAll();
                    demoType.showSwal(response.type,  response.message)
                }
            }
        });
    },
    typeEdit : function (data) {
        $.ajax({
            url: '/types/edit',
            type: 'post',
            data:{id:data['id'],designated:data['designated']},
            dataType: 'json',
            success: function(response){
                if (response.result === 'success'){
                    $('#editTypeModal').modal('hide');
                    evenma.typeAll();
                    demoType.showSwal(response.type,response.message);
                }else {
                    demoType.showSwal('error-message',"Your type has not been updated!");
                }
            }
        });
    },
    typeDelete : function (id) {
        $.ajax({
            url: '/types/delete',
            type: 'get',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                if (response === 1){
                    evenma.typeAll();
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
    evenma.typeAll();
    $(document).on('click','#addTypeSave', function () {
        var designated = $('#event-type-add-designated').val();
        evenma.typeAdd(designated)
    });
    $(document).on("click", ".btn-edit" , function() {
        var id = $(this).data('id');
        //console.log(id);
        evenma.typeGet(id);
    });
    $(document).on("click", ".btn-delete" , function() {
        var id = $(this).data('id');
        demoType.showSwal('warning-message-and-confirmation',null, id);
        //evenma.typeDelete(id);
    });
    $(document).on("click", "#editTypeSave" , function() {
        var data = {
            id : $('#event-type-edit-id').val(),
            designated : $('#event-type-edit-designated').val()
        };
        evenma.typeEdit(data);
    });
});
