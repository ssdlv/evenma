demoCity = {
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
                evenma.cityDelete(id);
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
  cityGet : function (id) {
      $.ajax({
          url: '/cities/get',
          type: 'get',
          data:{id:id},
          dataType: 'json',
          success: function(response){
              //console.log(response);
              $('#event-city-edit-id').val(response[0].id);
              $('#event-city-edit-designated').val(response[0].city_name);
          }
      });
  },
  cityAll : function () {
      $.ajax({
          url: '/cities/all',
          type: 'get',
          //data:{id:id},
          dataType: 'json',
          success: function(response){
              //console.log(response);
              var rows = '';
              $.each(response, function (key, value) {
                  rows = rows + '<tr>';
                  rows = rows + '<td class="text-center">'+value.id+'</td>';
                  rows = rows + '<td class="text-center">'+value.city_name+'</td>';
                  rows = rows + '<td class="text-center">'+value.city_using+'</td>';
                  rows = rows + '<td class="text-center">'+value.city_created+'</td>';
                  rows = rows + '<td class="text-center">'+value.city_updated+'</td>';
                  rows = rows + '<td class="td-actions text-right">\n' +
                      '   <button data-toggle="modal" data-target="#viewCityModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn btn-info btn-simple">\n' +
                      '          <i class="material-icons">person</i>\n' +
'                          </button>\n' +
                      '    <button data-toggle="modal" data-target="#editCityModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn-edit btn btn-success btn-simple">\n' +
                      '           <i class="material-icons">edit</i>\n' +
                      '    </button>\n' +
                      '    <button data-toggle="modal" data-target="#deleteCityModal" data-id="'+value.id+'" type="button" rel="tooltip" class="btn-delete btn btn-danger btn-simple">\n' +
                      '           <i class="material-icons">close</i>\n' +
                      '    </button>\n' +
                      '</td>';
                  rows = rows + '</tr>';
              });
              $('#citiesTable').html(rows);

          }
      });
  },
  cityAdd : function (designated) {
      $.ajax({
          url: '/cities/add',
          type: 'post',
          data:{designated:designated},
          dataType: 'json',
          success: function(response){
              console.log(response);
              if (response.result === 'success'){
                  $('#addCityModal').modal('hide');
                  evenma.cityAll();
                  demoCity.showSwal(response.type,  response.message)
              }
          }
      });
  },
  cityEdit : function (data) {
      $.ajax({
          url: '/cities/edit',
          type: 'post',
          data:{id:data['id'],designated:data['designated']},
          dataType: 'json',
          success: function(response){
              //console.log(response);
              if (response.result === 'success'){
                  $('#editCityModal').modal('hide');
                  evenma.cityAll();
                  demoCity.showSwal(response.type,response.message);
              }else {
                  demoCity.showSwal('error-message',"Your city has not been updated!");
              }
          }
      });
  },
  cityDelete : function (id) {
      $.ajax({
          url: '/cities/delete',
          type: 'get',
          data:{id:id},
          dataType: 'json',
          success: function(response){
              if (response === 1){
                  evenma.cityAll();
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
    evenma.cityAll();
    $(document).on('click','#addCitySave', function () {
        var designated = $('#event-city-designated').val();
        evenma.cityAdd(designated)
    });
    $(document).on("click", ".btn-edit" , function() {
        var id = $(this).data('id');
        evenma.cityGet(id);
    });
    $(document).on("click", ".btn-delete" , function() {
        var id = $(this).data('id');
        demoCity.showSwal('warning-message-and-confirmation',null, id);
        //evenma.cityDelete(id);
    });
    $(document).on("click", "#editCitySave" , function() {
        var data = {
            id : $('#event-city-edit-id').val(),
            designated : $('#event-city-edit-designated').val()
        };
        evenma.cityEdit(data);
    });
});
