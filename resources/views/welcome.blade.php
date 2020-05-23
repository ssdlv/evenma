@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <style>
        .timer-title-bloc{
            padding-top: 35px;
        }
        .timer-badge{
            margin-right: 12px;
            margin-left: 12px;
        }
    </style>
    <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('assets/img/bg0.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <div class="brand">
                        <h1>Evenma
                            <span class="pro-badge">
                                TM
                            </span>
                        </h1>
                        <!--h3 id="titleh3" class="timer-title-bloc">
                            <span id="days" class="pro-badge timer-badge">
                                D
                            </span>
                            <span  id="hours" class="pro-badge timer-badge">
                                H
                            </span>
                            <span id="minutes" class="pro-badge timer-badge">
                                M
                            </span>
                            <span id="seconds"n class="pro-badge timer-badge">
                                S
                            </span>
                        </h3-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised" ng-app>
        <div id="cards" class="cd-section section" style="padding: 0px;">
            <div class="section-white">
                <div class="cards">
                    <div class="">
                        <div class="section" style="padding: 0px;">
                            <div class="container">
                                <h2 class="section-title">Find what you need</h2>
                                <div class="row">
                                    <div >
                                        @verbatim
                                            <p>Name: <input type="text" ng-model="name"></p>
                                            {{ name }}

                                            <div class="row" ng-init="users['Mariel', 'Evha', 'ABIR]">
                                                <p ng-bind="users"></p>
                                                <ul>
                                                    <li ng-repeat="user in users">{{ user }}</li>
                                                </ul>
                                            </div>
                                        @endverbatim
                                        <br><!--p ng-bind="name"></p-->
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @php
                /*use Illuminate\Support\Facades\App;
                use Illuminate\Http\Request;
                $request = new Request();
                dump(\Illuminate\Support\Facades\Session::all());
                /*$locale = App::getLocale();
                App::setLocale('fr');
                dump($locale);
                /*$str_ip = gethostbyname(trim(`hostname -I`));
                $ip = explode(' ',$str_ip);
                $ip = $ip[0];
                dump($ip);*/

            /*function get_local_ipv4() {
                  $out = explode(PHP_EOL,shell_exec("/sbin/ifconfig"));
                  $local_addrs = array();
                  $ifname = 'unknown';
                  foreach($out as $str) {
                    $matches = array();
                    if(preg_match('/^([a-z0-9]+)(:\d{1,2})?(\s)+Link/',$str,$matches)) {
                      $ifname = $matches[1];
                      if(strlen($matches[2])>0) {
                        $ifname .= $matches[2];
                      }
                    } elseif(preg_match('/inet addr:((?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3})\s/',$str,$matches)) {
                      $local_addrs[$ifname] = $matches[1];
                    }
                  }
                  return $local_addrs;
                }

                $addrs = get_local_ipv4();
                var_export($addrs);
                dump($addrs);*/
            @endphp
            <div class="section-white">
                <div class="cards">
                    <div class="container">
                        <div class="title">
                            <h3>Stories</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="carousel"style="padding: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <h1>Titre principal</h1>
                        <p>Un paragraphe</p>
                        <p id='p1'></p>

                        <button id='b1'>Deux pages en arrières dans l'historique</button>
                        <button id='b2'>Vers la page précédente dans l'historique</button>
                        <button id='b3'>Vers la page suivante dans l'historique</button>
                    </div>
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="card card-raised card-form-horizontal">
                            <div class="card-body">
                                <form method="" action="">
                                    <div class="row">
                                        <div class="col-sm-8">
                                                        <span class="bmd-form-group">
                                                            <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="material-icons">mail</i>
                                                                </span>
                                                              </div>
                                                               <input id="email" type="search" class="form-control" placeholder="Your e-mail...">
                                                            </div>
                                                        </span>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-rose btn-block">NewsLetter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="section section-download" id="downloadSection"
             style="padding: 0px 0px 70px;">
            <div class="container">
                <div class="sharing-area text-center">
                    <div class="row justify-content-center">
                        <h3>Thank you for supporting us!</h3>
                    </div>
                    <button id="twitter" class="btn btn-raised btn-twitter sharrre">
                        <i class="fa fa-twitter"></i> Tweet
                    </button>
                    <button id="facebook" class="btn btn-raised btn-facebook sharrre">
                        <i class="fa fa-facebook-square"></i> Share
                    </button>
                    <button id="googleplus" class="btn btn-raised btn-google-plus sharrre">
                        <i class="fa fa-google-plus"></i> Google
                    </button>
                    <!--a id="whatsapp" href="https://web.whatsapp.com/send?text=Hello Kyle" target="_blank" class="btn btn-raised btn-github" style="color: #25D366">
                        <i class="fa fa-whatsapp"></i> Share
                    </a-->
                    <!--a id="github" href="https://github.com/creativetimofficial/material-kit" target="_blank" class="btn btn-raised btn-github">
                        <i class="fa fa-github"></i> Star
                    </a-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('template.cli.partials.footer.footer')
@endsection
@section('script')
    <script>

        //console.log(window.history.back());
    </script>
    @include('template.cli.partials.script.script')
@endsection
