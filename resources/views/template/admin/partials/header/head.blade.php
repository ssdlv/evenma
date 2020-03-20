@php
    session_start();
@endphp

<!-- Mirrored from demos.creative-tim.com/bs3/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jan 2020 03:40:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/settings/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/settings/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Evenma</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro"/>

    <!--  Social tags      -->
    <meta name="keywords" content="Evenma, Event, Evénement, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">

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

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/admin/css/material-dashboard.css') }}" rel="stylesheet">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/admin/css/demo.css') }}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/font-google.css') }}" rel="stylesheet">

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
    <link rel="stylesheet" href="{{ asset('css/ui.css') }}">
    <style>
        @media screen and (min-width: 993px) {
            body {
                /*background-color: #6e7dd3;*/
            }

            .loading {
                padding-left: 150px;
            }
            .loading-center {
                margin: auto;
                text-align: center;
                width: 50%;
                padding: 10px;
                padding-left: 150px;
            }
        }
    </style>
</head>
