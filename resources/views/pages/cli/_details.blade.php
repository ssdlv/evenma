@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

<!--good first-->
@section('content')
    <div class="page-header header-filter div-header" data-parallax="true" filter-color="rose">
        <div class="container">
            <div class="row title-row">
                <div class="col-md-4 ml-auto">
                </div>
            </div>
        </div>
    </div>
    <div class="section" style="padding-bottom: 30px;">
        <div class="container">
            <div class="main main-raised main-product" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-page1">
                                <img src="{{ $event->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page2" >
                                <img src="{{ $event->pictures->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page3">
                                <img src="{{ $event->pictures->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page4">
                                <img src="{{ $event->pictures->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                        </div>
                        <div class="tab-content">
                            <ul class="nav flexi-nav ul-small-img" data-tabs="tabs" id="flexiselDemo1">
                                <li class="nav-item">
                                    <a href="#product-page1" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page2" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event->pictures->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page3" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event->pictures->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page4" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event->pictures->picture }}">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h3 class="title">
                            {{ $event[0]->event_title }}
                            <small class="pro-badge">({{ $event[0]->type_name }})</small>
                        </h3>
                        <!--h3 class="main-price">$335</h3-->
                        <div id="accordion" role="tablist">
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Description
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <!--collapse show-->
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body" >
                                        <p>{{ $event[0]->event_desc }}.</p>

                                        @foreach($event[0]->elements as $element)
                                            <div class="form-group row">
                                                <div class="input-group col-12">
                                                    <li>
                                                        <a href="javascript:void(0)">{{ $element->element_date }}  -  {{ $element->element_title }}</a>
                                                        <ul>
                                                            @foreach($element->items as $item)
                                                                <li>{{ $item->item_start }} à {{ $item->item_end }} -> <a href="javascript:void(0)">{{ $item->item_title }}</a></li>
                                                                @php
                                                                    //dump($item->item_title);
                                                                @endphp
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Time And Location
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body" style="list-style-type: none;">
                                        <!--ul style="list-style-type: none;"-->
                                        @if(strlen($event[0]->event_location) <= 36 && strlen($event[0]->city_name) <= 22)
                                            <div class="form-group row ">
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->date }}</li>
                                                </div>
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-clock-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->time }}</li>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class="input-group col-7">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->event_location }}</li>
                                                </div>
                                                <div class="input-group col-5">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->city_name }}</li>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-group row">
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->start }}</li>
                                                </div>
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->city_name }}</li>
                                                </div>
                                            </div>
                                            <div class="form-group row text-center">
                                                <div class="input-group col-12">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event[0]->event_location }}</li>
                                                </div>
                                            </div>
                                    @endif
                                    <!--/ul-->
                                    </div>
                                </div>
                            </div>
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Details and Care
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body" style="list-style-type: none;">
                                        <!--Begin Phone Number-->
                                        <div class="form-group row">
                                            <div class="input-group col-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <li><a href="tel:{{ $event[0]->option[0]->phone0 }}" title="Click to call">{{ $event[0]->option[0]->phone0 }}</a></li>
                                            </div>
                                            <div class="input-group col-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <li><a href="tel:{{ $event[0]->option[0]->phone1 }}" title="Click to call">{{ $event[0]->option[0]->phone1 }}</a></li>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group col-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <li><a href="tel:{{ $event[0]->option[0]->phone2 }}" title="Click to call">{{ $event[0]->option[0]->phone2 }}</a></li>
                                            </div>
                                        </div>
                                        <!--Begin Phone Number-->

                                        <!--Begin Link URL-->
                                        <div class="form-group row">
                                            <div class="input-group col-12">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-facebook-f"></i>
                                                        </span>
                                                </div>
                                                <li><a href="{{ $event[0]->option[0]->link0 }}" title="Facebook Page">{{ $event[0]->option[0]->link0 }}</a></li>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group col-12">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-instagram"></i>
                                                        </span>
                                                </div>
                                                <li><a href="{{ $event[0]->option[0]->link1 }}" title="Instagram Page">{{ $event[0]->option[0]->link1 }}</a></li>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group col-12">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-link"></i>
                                                        </span>
                                                </div>
                                                <li><a href="{{ $event[0]->option[0]->link2 }}" title="Web Site">{{ $event[0]->option[0]->link2 }}</a></li>
                                            </div>
                                        </div>
                                        <!--End Link URL-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pick-size">
                            <!--div class="col-md-6 col-sm-6">
                                <label>Select color</label>
                                <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                    <option value="1">Rose </option>
                                    <option value="2">Gray</option>
                                    <option value="3">White</option>
                                </select>
                            </div-->
                            <!--div class="col-md-6 col-sm-6">
                                <label>Select size</label>
                                <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                    <option value="1">Small </option>
                                    <option value="2">Medium</option>
                                    <option value="3">Large</option>
                                </select>
                            </div-->
                        </div>
                        <div class="container row pull-right sharethis-inline-share-buttons st-center st-has-labels  st-inline-share-buttons st-animated" id="st-1">
                            <!--button class="btn btn-rose btn-round">Share &#xA0;<i class="material-icons">share</i></button-->
                        </div>
                        <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-share-buttons"></div>
                        <!-- ShareThis END -->
                    </div>
                    @php
                        dump(csrf_token ());
                        //dump($event[0]->elements[0]->items);
                        //dump($suggestions);
                    @endphp
                </div>
            </div>
            <div class="features text-center" style="padding-top: 0px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <h4 class="info-title">2 Days Delivery </h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Refundable Policy</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">favorite</i>
                            </div>
                            <h4 class="info-title">Popular Item</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-products" style="margin-top: 0px;">
                <h3 class="title text-center">You may also be interested in:</h3>
                <div class="row">
                    @foreach($suggestions as $suggestion)
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-product">
                                <div class="card-header card-header-image">
                                    <a href="{{ route('details') }}?event={{ $suggestion->event_id }}">
                                        <img class="img" src="{{ $suggestion->event_image }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-info">{{ $suggestion->type_name }}</h6>
                                    <h4 class="card-title">
                                        <a href="{{ route('details') }}?event={{ $suggestion->event_id }}">{{ $suggestion->event_title }}</a>
                                    </h4>
                                    <p class="card-description">{{ $suggestion->event_desc }}</p>
                                </div>
                                <div class="card-footer ">
                                    <div class="stats m-sm-auto">
                                        <i class="material-icons">room</i> {{ $suggestion->city_name }}
                                    </div>
                                    <div class="stats ml-auto">
                                        <i class="material-icons">alarm</i> {{ $suggestion->event_start }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-header header-filter div-header" data-parallax="true" filter-color="rose">
        <div class="container">
            <div class="row title-row">
                <div class="col-md-4 ml-auto">
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-page1">
                                <img src="{{ $event{0}->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page2" >
                                <img src="{{ $event{0}->pictures[0]->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page3">
                                <img src="{{ $event{0}->pictures[1]->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page4">
                                <img src="{{ $event{0}->pictures[2]->picture }}" style="height: 400px; max-width: 400px;">
                            </div>
                        </div>
                        <div class="tab-content">
                            <ul class="nav flexi-nav ul-small-img" data-tabs="tabs" id="flexiselDemo1">
                                <li class="nav-item">
                                    <a href="#product-page1" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event{0}->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page2" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event{0}->pictures[0]->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page3" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event{0}->pictures[1]->picture }}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-page4" class="nav-link" data-toggle="tab">
                                        <img src="{{ $event{0}->pictures[2]->picture }}">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h3 class="title">
                            {{ $event{0}->event_title }}
                            <small class="pro-badge">({{ $event{0}->type_name }})</small>
                        </h3>
                        <!--h3 class="main-price">$335</h3-->
                        <div id="accordion" role="tablist">
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Description
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <!--collapse show-->
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $event{0}->event_desc }}.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Time And Location
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul style="list-style-type: none;">
                                            <div class="form-group row ">
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event{0}->date }}</li>
                                                </div>
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-clock-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event{0}->time }}</li>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-o"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event{0}->event_location }}</li>
                                                </div>
                                                <div class="input-group col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                    <li>{{ $event{0}->city_name }}</li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-collapse">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Details and Care
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li>Storm and midnight-blue stretch cotton-blend</li>
                                            <li>Notch lapels, functioning buttoned cuffs, two front flap pockets, single vent, internal pocket</li>
                                            <li>Two button fastening</li>
                                            <li>84% cotton, 14% nylon, 2% elastane</li>
                                            <li>Dry clean</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pick-size">
                            <!--div class="col-md-6 col-sm-6">
                                <label>Select color</label>
                                <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                    <option value="1">Rose </option>
                                    <option value="2">Gray</option>
                                    <option value="3">White</option>
                                </select>
                            </div-->
                            <!--div class="col-md-6 col-sm-6">
                                <label>Select size</label>
                                <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                    <option value="1">Small </option>
                                    <option value="2">Medium</option>
                                    <option value="3">Large</option>
                                </select>
                            </div-->
                        </div>
                        <div class="container row pull-right sharethis-inline-share-buttons st-center st-has-labels  st-inline-share-buttons st-animated" id="st-1">
                            <!--button class="btn btn-rose btn-round">Share &#xA0;<i class="material-icons">share</i></button-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="features text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <h4 class="info-title">2 Days Delivery </h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Refundable Policy</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">favorite</i>
                            </div>
                            <h4 class="info-title">Popular Item</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-products">
                <h3 class="title text-center">You may also be interested in:</h3>
                <div class="row">
                    @foreach($suggestions as $suggestion)
                        <div class="col-lg-4 col-md-6">
                            <div class="card card-blog">
                                <div class="card-header card-header-image">
                                    <a href="#pablo">
                                        <img class="img" src="{{ $suggestion->event_image }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-info">{{ $suggestion->type_name }}</h6>
                                    <h4 class="card-title">
                                        <a href="#pablo">{{ $suggestion->event_title }}</a>
                                    </h4>
                                    <p class="card-description">{{ $suggestion->event_desc }}</p>
                                </div>
                                <div class="card-footer ">
                                    <div class="author">
                                        <a href="#pablo">
                                            <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                            <span>Mike John</span>
                                        </a>
                                    </div>
                                    <div class="stats ml-auto">
                                        <i class="material-icons">schedule</i> {{ $suggestion->event_start }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
