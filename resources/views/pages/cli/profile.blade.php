@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('../assets/img/city-profile.jpg');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                @if(session()->has('users.image') && session('users.image') != null)
                                    <img src="{{ asset('assets/img/faces/') }}/{{ session('users.image') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                @else
                                    <img src="{{ asset('assets/img/faces/kendall.jpg') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                @endif
                            </div>
                            <div class="name">
                                <h3 class="title">{{ session('users.name') }}</h3>
                                <h6>{{ session('users.email') }}</h6>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                        <div class="follow">
                            <button class="btn btn-fab btn-primary btn-round" rel="tooltip" title="New Event">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>An artist of considerable range, Chet Faker &#x2014; the name taken by Melbourne-raised, Brooklyn-based Nick Murphy &#x2014; writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <!--
                                                                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                                                -->
                                <li class="nav-item">
                                    <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                                        <i class="material-icons">palette</i>
                                        Publish
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#connections" role="tab" data-toggle="tab">
                                        <i class="material-icons">people</i>
                                        Waiting
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#media" role="tab" data-toggle="tab">
                                        <i class="material-icons">camera</i>
                                        Media
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-space">
                    <div class="tab-pane active work" id="work">
                        <div class="row">
                            <div class="col-md-7 ml-auto mr-auto ">
                                <h4 class="title">Latest Publications</h4>
                                <div class="row collections" id="list-event-publish">
                                    @foreach($event_publish as $event)
                                        <div class="col-md-6">

                                            <div class="card card-background" style="background-image: url('{{ $event->event_image }}')">
                                                <div class="dropdown">
                                                    <a id="closeBar" class=" nav-link" data-toggle="dropdown">
                                                        <i class="material-icons">more_horiz</i>
                                                    </a>
                                                    <!--button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Dropdown button
                                                    </button-->
                                                    <div class="dropdown-menu dropdown-with-icons">
                                                        <a href="/details?event={{ $event->event_id }}" class="dropdown-item">
                                                            <i class="material-icons">visibility</i> View
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)"></a>
                                                <div class="card-body">
                                                <label class="badge badge-warning">{{ $event->type_name }}</label>
                                                <a href="javascript:void(0)">
                                                    <h4 class="card-title">{{ $event->event_title }}</h4>
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @include('pages.cli.aside-profile')
                        </div>
                    </div>
                    <div class="tab-pane work" id="connections">
                        <div class="row">
                            <div class="col-md-7 ml-auto mr-auto ">
                                <h4 class="title">Latest Waiting</h4>
                                <div class="row collections" id="list-event-not-publish">
                                    @foreach($event_not_publish as $event)
                                        <div class="col-md-6">
                                        <div class="card card-background" style="background-image: url('{{ $event->event_image }}')">
                                            <div class="card-header">
                                                <!--div class="float-right">
                                                    <div class="dropdown">
                                                        <a id="closeBar" class=" nav-link" data-toggle="dropdown">
                                                            <i class="material-icons">more_horiz</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-with-icons">
                                                            <a href="/details?event={{ $event->event_id }}" class="dropdown-item">
                                                                <i class="material-icons">visibility</i> View
                                                            </a>
                                                            <a href="/edit?event={{ $event->event_id }}" class="dropdown-item">
                                                                <i class="material-icons">edit</i> Edit
                                                            </a>
                                                            <a href="/delete?event={{ $event->event_id }}" class="dropdown-item">
                                                                <i class="material-icons">delete</i> Delete
                                                            </a>
                                                            <a id="event-publish-link" data-id="{{ $event->event_id }}" href="javascript:void(0)" class="dropdown-item">
                                                                <i class="material-icons">send</i> Publish
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div-->

                                            </div>

                                            <a href="javascript:void(0)"></a>
                                            <div class="card-body">
                                                <label class="badge badge-danger">{{ $event->type_name }}</label>
                                                <a href="javascript:void(0)">
                                                    <h4 class="card-title">{{ $event->event_title }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @include('pages.cli.aside-profile')
                        </div>
                    </div>

                    <div class="tab-pane text-center gallery" id="media">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="../assets/img/examples/mariya-georgieva.jpg" class="rounded">
                                <img src="../assets/img/examples/clem-onojegaw.jpg" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="../assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                                <img src="../assets/img/examples/olu-eletu.jpg" class="rounded">
                                <img src="../assets/img/examples/cynthia-del-rio.jpg" class="rounded">
                            </div>
                        </div>
                    </div>
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
