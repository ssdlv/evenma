<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            TM
        </a>

        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ env('APP_NAME', 'Evenma') }}
        </a>
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/faces/avatar.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                         {{ session('users.name') }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">
                                    <i class="material-icons">person</i>
                                </span>
                                <span class="sidebar-normal"> Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <span class="sidebar-mini">
                                    <i class="material-icons">https</i>
                                </span>
                                <span class="sidebar-normal"> {{ __('Logout') }} </span>
                            </a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="">
                @if( session()->has('users.profile') and session('users.profile') == 'admin')
                <a href="{{ route('profile') }}?user={{ session('users.id') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
                @else
                    <a href="{{ route('profile') }}?user={{ session('users.id') }}">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                @endif
            </li>



            <li class="">
                <a href="{{ route('add') }}">
                    <i class="material-icons">add_circle_outline</i>
                    <p> New Event </p>
                </a>
            </li>
            <li>
                <a href="{{ route('publishEvent') }}">
                    <i class="material-icons">done_all</i>
                    <p> Publish Events </p>
                </a>
            </li>
            <li>
                <a href="{{ route('waitingEvent') }}">
                    <i class="material-icons">done</i>
                    <p> Waiting Events </p>
                </a>
            </li>

            @if( session()->has('users.profile') and session('users.profile') == 'admin')
            <li>
                <a href="{{ route('city') }}">
                    <i class="material-icons">room</i>
                    <p> Cities </p>
                </a>
            </li>
            <li>
                <a href="{{ route('type') }}">
                    <i class="material-icons">assignment</i>
                    <p> Types </p>
                </a>
            </li>
            @endif

            <li>
                <a href="javascript:void(0)">
                    <i class="material-icons">settings</i>
                    <p> Settings </p>
                </a>
            </li>



        </ul>
    </div>
</div>
