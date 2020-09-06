@php
    session_start();
@endphp
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/settings/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/settings/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ env('APP_NAME', 'Evenma') }}</title>
    <meta name="keywords" content="Evenma, Event, Events, Evénement, Evénements">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="http://evenma.heroku.com" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--  Social tags      -->
    <meta name="keywords" content="Evenma">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@evenma">
    <meta name="twitter:title" content="Evenma">
    <meta name="twitter:description" content="Evenma.">
    <meta name="twitter:creator" content="@evenma">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/38/original/opt_mk_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Evenma" />
    <meta property="og:type" content="events" />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/38/original/opt_mk_thumbnail.jpg" />
    <meta property="og:description" content="Evenma" />
    <meta property="og:site_name" content="Evenma" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/cli/css/material/material-kit.mine45f.css') }}?v=2.0.6" rel="stylesheet" />
    <link href="{{ asset('assets/cli/css/material/material-kit.mind1f1.css') }}?v=2.0.6" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/cli/css/demo/demo.css') }}" rel="stylesheet"/>
    <!-- Google Tag Manager -->
    <script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{ asset('css/ui.css') }}">
    <!--script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5de2fbaa3258ca0012c8055f&product=inline-share-buttons' async='async'></script-->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5de30877ffa1890012c403e4&product=inline-share-buttons" async="async"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
