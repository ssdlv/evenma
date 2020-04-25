$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on("click", "#link-login", function () {
        uiLogin();
    });
    $(document).on("click", "#link-register", function () {
        uiRegister();
    });
    $(document).on("click", "#link-about", function () {
        uiAbout();
    });
    $(document).on("click", "#link-contact", function () {
        uiContact();
    });
    $(document).on("click", "#link-cgu", function () {
        uiCGU();
    });
    $(document).on("click", "#link-add", function () {
        uiAdd();
    });
    $(document).on("click", "#link-edit", function () {
        uiEdit();
    });
    $(document).on("click", "#link-home", function () {
        uiHome();
    });
    $(document).on("click", "#link-details", function () {
        uiDetails();
    });
});
