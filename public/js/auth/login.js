$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", "#link-login-data", function () {
        let email = $('#email').val();
        let password = $('#password').val();
        $.ajax({
            url: '/auth/login',
            type: 'POST',
            data:{email:email,password:password},
            dataType: 'json',
            success: function(response){
                if (response.result === 'success'){
                    toastAlert(response.title, response.message, response.result);
                }
                else if (response.result === 'warning'){
                    console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
                else {
                    console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
            }
        });
    });
    $(document).on("click", "#link-logout", function () {
        $.ajax({
            url: '/auth/logout',
            type: 'get',
            data:{},
            dataType: 'json',
            success: function(response){
                console.log(response);
            }
        });
    });
});
