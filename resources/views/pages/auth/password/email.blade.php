@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <div class="page-header header-filter clear-filter " data-parallax="true" style="background-image: url('assets/img/bg0.jpg'); ">
        <div class="container" style="padding-top: 120px">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form id="form-login-stop" class="form" method="post" action="{{ route('password.email') }}" style="min-height: 320px;">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title">Reset Password</h4>
                                <div class="social-line">
                                    <a href="javascript:void(0)" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-just-icon btn-link">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="description text-center">Or Be Classical</p>
                            @if (session('status'))
                                <p class="description text-center"
                                style="color: #FFFFFF; background-color: #008000;">
                                    {{ session('status') }}
                                </p>
                            @endif
                            <div class="card-body">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">mail</i>
                                    </span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">
                                    @error('email')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" id="link-register-data" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Send Password Reset Link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('template.cli.partials.footer.footer')
    </div>
@endsection

@section('footer')
@endsection

@section('script')
    @include('template.cli.partials.script.script')
@endsection
