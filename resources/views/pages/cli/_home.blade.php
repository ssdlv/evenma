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
    <div class="main main-raised">
        <div id="cards" class="cd-section section" style="padding-top: 5px;
                padding-left: 0px;
                padding-right: 0px;
                padding-bottom: 5px;">
            <div class="section-white">

                <div class="cards">
                    <div class="section">
                        <div class="container">
                            <div class="title">
                                <div class="row" >
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
                                                                  <i class="material-icons">search</i>
                                                                </span>
                                                              </div>
                                                               <input id="search" type="search" class="form-control" placeholder="Search...">
                                                            </div>
                                                        </span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" class="btn btn-rose btn-block">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-sm-4">
                                        <select id="change-city" class="selectpicker " data-style="select-with-transition" data-size="7">
                                            <option value="0">Choose Your City</option>
                                        </select>
                                    </div>
                                    <div class="form-group row col-sm-4">
                                        <select id="change-type" class="selectpicker " data-style="select-with-transition" data-size="7">
                                            <option value="0">Choose Your Type Event</option>
                                        </select>
                                    </div>
                                    <div class="form-group row col-sm-4">
                                        <a href="#" id="reportrange" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                            <span id="span-date" class="filter-option-data-range"></span>
                                        </a>
                                        <input type="hidden" id="time-start">
                                        <input type="hidden" id="time-end">
                                    </div>
                                </div>
                                <h2 class="section-title">Latest Events</h2>
                            </div>
                            <div class="row" id="list-premium-events">
                                @foreach($events as $event)
                                    <div class="col-lg-4 col-md-6">
                                        <input type="hidden" id="event-id" value="{{ $event->event_id }}">
                                        <div class="card card-blog">
                                            <div class="card-header card-header-image">
                                                <a href="/details/{{ $event->event_id }}" class="add-view">
                                                    <img class="img" src="/files/events/{{ $event->event_image }}">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="card-category text-info">{{ $event->type_name }}</h6>
                                                <h4 class="card-title" class="add-view">
                                                    <a href="/details/{{ $event->event_id }}">{{ $event->event_title }}</a>
                                                </h4>
                                                <p class="card-description">{{ $event->event_desc }}</p>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="author">
                                                    <a href="#pablo">
                                                        <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                                        <span>Mike John</span>
                                                    </a>
                                                </div>
                                                <div class="stats ml-auto">
                                                    <i class="material-icons">schedule</i> {{ $event->event_start }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="container">

                        <div class="section">
                            <div class="container">
                                <h2 class="section-title">Find what you need</h2>
                                <div class="row">
                                    <!--div class="col-md-3">
                                        <div class="card card-refine card-plain card-rose">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    Refine
                                                    <button class="btn btn-default btn-fab btn-fab-mini btn-link pull-right" rel="tooltip" title="" data-original-title="Reset Filter">
                                                        <i class="material-icons">cached</i>
                                                    </button>
                                                </h4>
                                                <div id="accordion" role="tablist">
                                                    <div class="card card-collapse">
                                                        <div class="card-header" role="tab" id="headingOne">
                                                            <h5 class="mb-0">
                                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Price Range
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="card-body card-refine">
                                                                <span id="price-left" class="price-left pull-left" data-currency="€">€42</span>
                                                                <span id="price-right" class="price-right pull-right" data-currency="€">€880</span>
                                                                <div class="clearfix"></div>
                                                                <div id="sliderRefine" class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card card-collapse">
                                                        <div class="card-header" role="tab" id="headingTwo">
                                                            <h5 class="mb-0">
                                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Clothing
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                            <div class="card-body">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                                        Blazers
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Casual Shirts
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Formal Shirts
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Jeans
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Polos
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Pyjamas
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Shorts
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Trousers
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card card-collapse">
                                                        <div class="card-header" role="tab" id="headingThree">
                                                            <h5 class="mb-0">
                                                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Designer
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree">
                                                            <div class="card-body">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                                        All
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Polo Ralph Lauren
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Wooyoungmi
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Alexander McQueen
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Tom Ford
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        AMI
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Berena
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Thom Sweeney
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Burberry Prorsum
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Calvin Klein
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Kingsman
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Club Monaco
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Dolce &amp; Gabbana
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Gucci
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Biglioli
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Lanvin
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Loro Piana
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Massimo Alba
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card card-collapse">
                                                        <div class="card-header" role="tab" id="headingFour">
                                                            <h5 class="mb-0">
                                                                <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                    Colour
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                                            <div class="card-body">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                                        All
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Black
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Blue
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Brown
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Gray
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Green
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Neutrals
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" value="">
                                                                        Purple
                                                                        <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div-->
                                    <div class="col-md-12">
                                        <div class="row" id="list-events">
                                            @foreach($events as $event)
                                                <div class="col-lg-4 col-md-6">
                                                    <input type="hidden" id="event-id" value="{{ $event->event_id }}">
                                                    <div class="card card-blog">
                                                        <div class="card-header card-header-image">

                                                            <a href="/details?event={{ $event->event_id }}" class="add-view">
                                                                <img class="img" src="/files/events/{{ $event->event_image }}">
                                                            </a>

                                                        </div>
                                                        <div class="card-body">
                                                            <h6 class="card-category text-info">{{ $event->type_name }}</h6>
                                                            <h4 class="card-title" class="add-view">
                                                                <a href="/details?event={{ $event->event_id }}">{{ $event->event_title }}</a>
                                                            </h4>
                                                            <p class="card-description">{{ $event->event_desc }}</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="author">
                                                                <a href="#pablo">
                                                                    <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                                                    <span>Mariel Evha</span>
                                                                </a>
                                                            </div>
                                                            <div class="stats ml-auto">
                                                                <i class="material-icons">schedule</i> {{ $event->event_start }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 ml-auto mr-auto">
                                                <h3 id="not-found-data" class="text-info"></h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 ml-auto mr-auto">
                                                <button id="load-more-event" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="">
                                                    <div id="load-spinner" class="lds-spinner">
                                                        <div></div><div></div><div></div><div></div><div></div><div></div>
                                                        <div></div><div></div><div></div><div></div><div></div><div></div>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Load more...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--h2 class="section-title">News in fashion</h2-->
                                <!--div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-background" style="background-image: url(../assets/img/examples/color1.jpg)">
                                            <div class="card-body">
                                                <h6 class="card-category text-info">Productivy Apps</h6>
                                                <a href="#pablo">
                                                    <h3 class="card-title">The best trends in fashion 2017</h3>
                                                </a>
                                                <p class="card-description">
                                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                </p>
                                                <a href="#pablo" class="btn btn-white btn-round">
                                                    <i class="material-icons">subject</i> Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-background" style="background-image: url(../assets/img/examples/color3.jpg)">
                                            <div class="card-body">
                                                <h6 class="card-category text-info">Fashion News</h6>
                                                <h3 class="card-title">Kanye joins the Yeezy team at Adidas</h3>
                                                <p class="card-description">
                                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                </p>
                                                <a href="#pablo" class="btn btn-white btn-round">
                                                    <i class="material-icons">subject</i> Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-background" style="background-image: url(../assets/img/examples/color2.jpg)">
                                            <div class="card-body">
                                                <h6 class="card-category text-info">Productivy Apps</h6>
                                                <a href="#pablo">
                                                    <h3 class="card-title">Learn how to use the new colors of 2017</h3>
                                                </a>
                                                <p class="card-description">
                                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                </p>
                                                <a href="#pablo" class="btn btn-white btn-round">
                                                    <i class="material-icons">subject</i> Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url(../assets/img/dg3.jpg)">
                                            <div class="card-body">
                                                <h6 class="card-category text-info">Tutorials</h6>
                                                <a href="#pablo">
                                                    <h3 class="card-title">Trending colors of 2017</h3>
                                                </a>
                                                <p class="card-description">
                                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                </p>
                                                <a href="#pablo" class="btn btn-white btn-round">
                                                    <i class="material-icons">subject</i> Read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url(../assets/img/dg1.jpg)">
                                            <div class="card-body">
                                                <h6 class="card-category text-info">Productivy Style</h6>
                                                <a href="#pablo">
                                                    <h3 class="card-title">Fashion &amp; Style 2017</h3>
                                                </a>
                                                <p class="card-description">
                                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                                </p>
                                                <a href="#pablo" class="btn btn-white btn-round">
                                                    <i class="material-icons">subject</i> read
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="limit-list-events"></div>
            <div class="section-white">
                <div class="cards">
                    <div class="container">
                        <div class="title">
                            <h3>Plain Cards</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section" id="carousel">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <!-- Carousel Card -->
                        <div class="card card-raised card-carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="assets/img/bg2.jpg" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>
                                                <i class="material-icons">location_on</i>
                                                Yellowstone National Park, United States
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="assets/img/bg3.jpg" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>
                                                <i class="material-icons">location_on</i>
                                                Somewhere Beyond, United States
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="assets/img/bg.jpg" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>
                                                <i class="material-icons">location_on</i>
                                                Yellowstone National Park, United States
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="material-icons">keyboard_arrow_left</i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Carousel Card -->
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
        <div class="section section-download" id="downloadSection" style="padding-top: -0px;">

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
                    <button id="googlePlus" class="btn btn-raised btn-google-plus sharrre">
                        <i class="fa fa-google-plus"></i> Share
                    </button>
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
    @include('template.cli.partials.script.script')
@endsection
