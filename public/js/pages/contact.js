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
          spinner = '<div id="load-spinner" class="lds-spinner">\n' +
              '                                        <div></div><div></div><div></div><div></div><div></div><div></div>\n' +
              '                                        <div></div><div></div><div></div><div></div><div></div><div></div>\n' +
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
    })

});
