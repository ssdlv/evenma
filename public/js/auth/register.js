auth = {
    register : function (name,email,password,phone,profile) {
        $.ajax({
            url: '/auth/register',
            type: 'post',
            data:{name:name,email:email,password:password,phone:phone,profile:profile},
            dataType: 'json',
            success: function(response){
                console.log(response);
                if (response.result === 'success'){
                    toastAlert(response.title, response.message, response.result);
                    sweet.show('info','Account has been built !',response.info);
                    //setTimeout(10000, uiLogin());
                }else if (response.result === 'warning'){
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }else {
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
            }
        });
    },
    login : function (email, password) {
        $.ajax({
            url: '/auth/login',
            type: 'post',
            data:{email:email,password:password},
            dataType: 'json',
            success: function(response){
                console.log(response);
                if (response.result === 'success'){

                }
                else if (response.result === 'warning'){

                }
                else {

                }
            }
        });
    }
};
sweet = {
    show : function (type,title='Good job!',message='You clicked!',icon ='success',button='OK') {
        if (type === 'info'){
            swal({
                title: title,
                text: message,
                icon: icon,
                //button: button,
                buttons: {
                    catch: {
                        text: "OK",
                        value: "redirect",
                    },
                    defeat: false,
                },
            }).then((value) => {
                if (value === "redirect") {
                    location.href = '/login';
                    //swal("Gotcha!", "Pikachu was caught!", "success");
                } else {
                    console.log('redirect');
                    //location.href = '/login';
                    //swal("Got away safely!");
                }
            });
        }
    }
};
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", "#register", function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var profile = document.getElementById('profile-pro').checked;
        var password = $('#password').val();
        console.log(name,email,password,phone,profile);
        throw '';
        if (profile === true){
            profile = 'professional'
        }
        else {
            profile = 'particular'
        }
        $.ajax({
            url: '/auth/register',
            type: 'POST',
            data:{name:name,email:email,password:password,phone:phone,profile:profile},
            dataType: 'json',
            success: function(response){
                console.log(response);
                /*if (response.result == 'success'){
                    toastAlert(response.title, response.message, response.result);
                    setTimeout(10000, uiLogin());
                }else if (response.result == 'warning'){
                    console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }else {
                    console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }*/
            }
        });
    });

    $('#form-login').on('submit', function (e) {
        e.preventDefault();
        let email = $('#email').val();
        let password = $('#password').val();
        auth.login(email,password);
    });
    $('#form-register').on('submit', function (e) {
        e.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let profile = document.getElementById('profile').checked;
        if (profile === false)
            profile = 'professional';
        else
            profile = 'particular';
        let password = $('#password').val();
        auth.register(name,email,password,phone,profile);
    });

    function register (name,email,password,phone,profile) {
        $.ajax({
            url: '/auth/register',
            type: 'post',
            data:{name:name,email:email,password:password,phone:phone,profile:profile},
            dataType: 'json',
            success: function(response){
                console.log(response);
                if (response.result === 'success'){
                    toastAlert(response.title, response.message, response.result);
                    sweet.show('info','Account has been built !',response.info);
                    //setTimeout(10000, uiLogin());
                }else if (response.result === 'warning'){
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }else {
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
            }
        });
    }

});
