@extends('template.admin.layout')

@section('content')
    <style>
        .txt-center{
            text-align: center;
        }
        .center{
            margin: auto;
            text-align: center;
            width: 50%;
            padding: 10px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <h3>Manage Listings</h3>
            <div class="card section">
                <div class="row">
                    <div class="col-sm-4">
                        <select class="selectpicker" id="" data-style="select-with-transition" vc title="Choose Type" data-size="7">
                            <option disabled> Choose type</option>
                            <option value="0">Choose Your City</option>
                        </select>
                    </div>
                    <div class="form-group row col-sm-4">
                        <select id="select-city" class="selectpicker txt-center" data-style="select-with-transition" title="Choose Your City" data-size="7">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row col-sm-4">
                        <select id="select-type" class="selectpicker txt-center" data-style="select-with-transition" title="Choose Your Type" data-size="7">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" id="list-events">
                            @foreach($event_publish as $event)
                                <div class="col-md-4">
                                    <div class="card card-product">
                                        <div class="card-image" data-header-animation="true">
                                            <a href="#pablo">
                                                <img class="img" src="{{ $event->event_image }}">
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <div class="card-actions">
                                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                                    <i class="material-icons">build</i> Fix Header!
                                                </button>

                                                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Promote">
                                                    <i class="material-icons">stars</i>
                                                </button>
                                            </div>

                                            <h4 class="card-title">
                                                <a href="#pablo">{{ $event->event_title }}</a>
                                            </h4>
                                            <div class="card-description">{{ $event->event_desc }}</div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats pull-left">
                                                <p class="category"><i class="material-icons">place</i>{{ $event->city_name }}</p>
                                            </div>
                                            <div class="stats pull-right">
                                                <p class="category"><i class="material-icons">alarm</i>{{ $event->event_start }}</p>
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
                        <div class="row center">
                            <div class="col-md-2 loading loading-center">
                                <button style="margin: auto" id="load-more-event" rel="tooltip" class=" btn btn-rose btn-round" data-original-title="" title="">
                                    <div id="load-spinner" class="lds-spinner">
                                        <div></div><div></div><div></div><div></div><div></div><div></div>
                                        <div></div><div></div><div></div><div></div><div></div><div></div>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Load more...
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/general/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/events/publish.js') }}"></script>
@endsection
