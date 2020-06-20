$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    run();
    function run(){
        $.ajax({
            url: '/tasks/run',
            type: 'get',
            //data:{event:event},
            dataType: 'json',
            success: function(response){
                console.log(response);
            }
        });
        //setTimeout(run, 1000);
    }

    let time = null;
    ofBar();
    function ofBar() {
        $('#ofBar').hide();
        time = setTimeout(ofBar, 0);
        if (time > 200){
            return 0;
        }
    }

});
