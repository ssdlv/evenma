<!--DOUBLE -->


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('assets/cli/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/cli/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/cli/js/plugins/moment.min.js') }}"></script>
<!--DOUBLE	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('assets/cli/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<!--DOUBLE  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('assets/cli/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--DOUBLE  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--DOUBLE	Plugin for Sharrre btn -->
<script src="{{ asset('assets/cli/js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/cli/js/material/material-kit.mine45f.js') }}?v=2.0.6" type="text/javascript"></script>
<!--DOUBLE	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('assets/cli/js/plugins/bootstrap-tagsinput.js') }}"></script>
<!--DOUBLE	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('assets/cli/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
<!--DOUBLE	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets/cli/js/plugins/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
<!--DOUBLE	Plugin for Small Gallery in Product Page -->
<script src="{{ asset('assets/cli/js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
<!--DOUBLE -->
<script src="{{ asset('assets/cli/js/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
<!--DOUBLE Plugins for presentation and navigation  -->
<script src="{{ asset('assets/cli/js/demo/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/cli/js/demo/vertical-nav.js') }}" type="text/javascript"></script>
<!--DOUBLE Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script async defer src="{{ asset('assets/admin/js/buttons.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
<!--DOUBLE? Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="{{ asset('assets/cli/js/demo/demo.js') }}" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->

<script>

	// Facebook Pixel Code Don't Delete
	! function(f, b, e, v, n, t, s) {
		if (f.fbq) return;
		n = f.fbq = function() {
			n.callMethod ?
				n.callMethod.apply(n, arguments) : n.queue.push(arguments)
		};
		if (!f._fbq) f._fbq = n;
		n.push = n;
		n.loaded = !0;
		n.version = '2.0';
		n.queue = [];
		t = b.createElement(e);
		t.async = !0;
		t.src = v;
		s = b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t, s)
	}(window,
		document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

	try {
		fbq('init', '111649226022273');
		fbq('track', "PageView");

	} catch (err) {
		console.log('Facebook Track Error:', err);
	}
</script>
<noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
</noscript>
<script>
	$(document).ready(function() {
		//init DateTimePickers
		materialKit.initFormExtendedDatetimepickers();

		// Sliders Init
		materialKit.initSliders();
	});


	function scrollToDownload() {
		if ($('.section-download').length != 0) {
			$("html, body").animate({
				scrollTop: $('.section-download').offset().top
			}, 1000);
		}
	}


	$(document).ready(function() {

		$('#facebook').sharrre({
			share: {
				facebook: true
			},
			enableHover: false,
			enableTracking: false,
			enableCounter: false,
			click: function(api, options) {
				api.simulateClick();
				api.openPopup('facebook');
			},
			template: '<i class="fab fa-facebook-f"></i> Facebook',
			url: 'http://evenma.herokuapp.com/'
		});

		$('#googlePlus').sharrre({
			share: {
				googlePlus: true
			},
			enableCounter: false,
			enableHover: false,
			enableTracking: true,
			click: function(api, options) {
				api.simulateClick();
				api.openPopup('googlePlus');
			},
			template: '<i class="fab fa-google-plus"></i> Google',
			url: 'http://evenma.herokuapp.com/'
		});

		$('#twitter').sharrre({
			share: {
				twitter: true
			},
			enableHover: false,
			enableTracking: false,
			enableCounter: false,
			buttons: {
				twitter: {
					via: 'Evenma'
				}
			},
			click: function(api, options) {
				api.simulateClick();
				api.openPopup('twitter');
			},
			template: '<i class="fab fa-twitter"></i> Twitter',
			url: 'http://evenma.herokuapp.com/'
		});

        $('#whatsapp').sharrre({
            share: {
                whatsapp: true
            },
            enableCounter: false,
            enableHover: false,
            enableTracking: true,
            click: function(api, options) {
                api.simulateClick();
                api.openPopup('whatsapp');
                /*$(api.element).on('click', '#whatsapp', function () {
                    api.openPopup('whatsapp');
                    return false;
                });*/
            },
            template: '<i class="fab fa-whatsapp"></i> Whatsapp',
            url: 'http://evenma.herokuapp.com/'
        });

	});
</script>

<script type="text/javascript" src="{{ asset('js/general/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/general/task.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/UI/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/UI/ui.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/auth/login.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/auth/register.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/events/event.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/events/profile.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/events/add.js') }}"></script>


<script type="text/javascript" src="{{ asset('js/pages/about.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/contact.js') }}"></script>

<script type="text/javascript">
    $('#ofBar').hide();
    //$('#ofBar').html('<div></div>');
</script>
