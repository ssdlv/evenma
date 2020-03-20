function uiLogin() {
    $.ajax({
        url: '/ui/login/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiRegister() {
    $.ajax({
        url: '/ui/register/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiAbout() {
    $.ajax({
        url: '/ui/about/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiDetails() {
    $.ajax({
        url: '/ui/details/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiHome() {
    $.ajax({
        url: '/ui/home/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiContact() {
    $.ajax({
        url: '/ui/contact/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiAdd() {
    $.ajax({
        url: '/ui/add/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiCGU() {
    $.ajax({
        url: '/ui/cgu/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
function uiEdit() {
    $.ajax({
        url: '/ui/edit/init',
        type: 'get',
        dataType: 'json',
        success: function(response){
            $('#content').html(response);
        }
    });
}
