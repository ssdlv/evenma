<!DOCTYPE html>
<html lang="fr">
    @include('template.admin.partials.header.head')
    <body class="">
        <div class="wrapper">
            @include('template.admin.partials.nav.side-bar')
            <div class="main-panel">
                @include('template.admin.partials.nav.nav-bar')
                @yield('content')
                @include('template.admin.partials.footer.footer')
            </div>
        </div>
    </body>
    @include('template.admin.partials.script.script')
    @yield('script')
</html>
