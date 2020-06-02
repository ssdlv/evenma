


<!--   Core JS Files   -->
<script src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/material/material.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/perfect-scrollbar.jquery.min.js') }}"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="{{ asset('assets/admin/js/core.js') }}"></script>

<!-- Library for adding dinamically elements -->
<script src="{{ asset('assets/admin/js/arrive.min.js') }}"></script>

<!-- Library for toastr -->
<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>

<!-- Library for SweetAlert -->
<!--script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script-->

<!-- Forms Validations Plugin -->
<script src="{{ asset('assets/admin/js/jquery/jquery.validate.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset('assets/admin/js/chartist.min.js') }}"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('assets/admin/js/jquery/jquery.bootstrap-wizard.js') }}"></script>

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap-notify.js') }}"></script>

<!--   Sharrre Library    -->
<script src="{{ asset('assets/admin/js/jquery/jquery.sharrre.js') }}"></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap-datetimepicker.js') }}"></script>

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('assets/admin/js/jquery/jquery-jvectormap.js') }}"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ asset('assets/admin/js/nouislider.min.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('assets/admin/js/jquery/jquery.select-bootstrap.js') }}"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('assets/admin/js/jquery/jquery.datatables.js') }}"></script>

<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset('assets/admin/js/sweetalert2.js') }}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets/admin/js/jasny-bootstrap.min.js') }}"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('assets/admin/js/fullcalendar.min.js') }}"></script>

<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('assets/admin/js/jquery/jquery.tagsinput.js') }}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets/admin/js/material/material-dashboard.js') }}"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/admin/js/demo/demo.js') }}"></script>
<script>
    // Facebook Pixel Code Don't Delete
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','http://connect.facebook.net/en_US/fbevents.js');

    try{
        fbq('init', '111649226022273');
        fbq('track', "PageView");

    }catch(err) {
        console.log('Facebook Track Error:', err);
    }

</script>
<noscript>
    <img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"
    />
</noscript>

<script type="text/javascript">
    $(document).ready(function(){

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
<script type="text/javascript" src="{{ asset('js/general/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/general/task.js') }}"></script>
