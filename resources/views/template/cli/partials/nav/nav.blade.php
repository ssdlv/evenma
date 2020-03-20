<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a id="link-homes" class="navbar-brand" href="{{ route('welcome') }}">
                Evenma </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <!--li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">apps</i> Components
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ route('add') }}" class="dropdown-item">
                            <i class="material-icons">add_circle_outline</i> Add Event
                        </a>
                        <a href="{{ route('about') }}" class="dropdown-item">
                            <i class="material-icons">group</i> About US
                        </a>
                        <a href="{{ route('contact') }}" class="dropdown-item">
                            <i class="material-icons">contacts</i> Contact
                        </a>
                    <--a href="javascript:void(0)" class="dropdown-item">
                            <i class="material-icons">content_paste</i> Documentation
                        </a->
                    </div>
                </li-->
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        <i class="material-icons">group</i> About US
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">
                        <i class="material-icons">contacts</i> Contact
                    </a>
                </li>
                @if( !session()->has('users'))
                    <li class="nav-item" id="">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="nav-item" id="">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                @endif

                @if( session()->has('users'))
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <!--i class="material-icons">apps</i--> {{ session('users.name') }}
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="{{ route('profile') }}?user={{ session('users.id') }}" class="dropdown-item">
                                <i class="material-icons">account_circle</i> Dashboard
                            </a>
                            <a href="{{ route('add') }}" class="dropdown-item">
                                <i class="material-icons">add_circle</i> Add Event
                            </a>
                            <div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
            @endif
            <!--li class="nav-item" id="">
                    <a class="nav-link" href="">
                        <i class="material-icons">add_circle</i>New Event
                    </a>
                </li-->
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/Evenma-101984468013161" target="_blank" data-original-title="Like us on Facebook">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/" target="_blank" data-original-title="Follow us on Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


