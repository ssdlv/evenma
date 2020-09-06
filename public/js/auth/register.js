auth = {
    register : function (name,email,password,phone,profile,address) {
        $.ajax({
            url: '/auth/register',
            type: 'post',
            data:{name:name,email:email,password:password,phone:phone,profile:profile,address:address},
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

    //$(document).on('change');
    $('input[type=radio][name=profile]').change(function() {
        let form = $('#form-register');
        let name = $('#name');
        let icon = $('#icon-name');
        let address = $('#form-group-address');
        clear();
        if (this.value === 'particular') {
            //form[0].reset();
            name.attr('placeholder','Your name');
            address.hide();
            address.html('');
        }
        else if (this.value === 'professional') {
            //form[0].reset();
            icon.text('account_balance');
            name.attr('placeholder','Church name');
            address.show();
            address.html('<div class="input-group">\n' +
                '                                                    <div class="input-group-prepend">\n' +
                '                                                      <span class="input-group-text">\n' +
                '                                                        <i class="material-icons">place</i>\n' +
                '                                                      </span>\n' +
                '                                                    </div>\n' +
                '                                                    <input id="address" name="address" type="text" class="form-control" placeholder="Church address" required>\n' +
                '                         ' +
                '' +
                '' +
                '' +
                '' +
                '' +
                '' +
                '' +
                '' +
                '' +
                '                       </div>');
        }
    });
    $('input[type=checkbox][name=cgu]').change(function () {
        console.log(this.checked);
        let button = $('#link-register-data');
        if (this.checked)
            button.removeAttr('disabled');
        else
            button.attr('disabled', true);
    });

    function clear() {
        $('#name').val('');
        $('#email').val('');
        $('#address').val('');
        $('#phone').val('');
        $('#password').val('');
    }

    $(document).on("click", "#register", function () {
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let profile = document.getElementById('profile-pro').checked;
        let password = $('#password').val();
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
        let address = null;
        if (profile === false) {
            profile = 'professional';
            address = $('#address').val();
        }
        else
            profile = 'particular';
        let password = $('#password').val();
        auth.register(name,email,password,phone,profile,address);
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
                }
                else if (response.result === 'warning'){
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
                else {
                    //console.log(response);
                    toastAlert(response.title, response.message, response.result);
                }
            }
        });
    }

    let churchForm = null;
    let particularForm = null;

});
