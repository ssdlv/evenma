@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <div class="signup-page sidebar-collapse">
        <div class="page-header header-filter clear-filter purple-filter" style="background-image: url('../assets/img/bg0.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="info info-horizontal">
                                            <div class="icon icon-rose">
                                                <i class="material-icons">timeline</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Marketing</h4>
                                                <p class="description">
                                                    We've created the marketing campaign of the website. It was a very interesting collaboration.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">code</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Fully Coded in HTML5</h4>
                                                <p class="description">
                                                    We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-info">
                                                <i class="material-icons">group</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Built Audience</h4>
                                                <p class="description">
                                                    There is also a Fully Customizable CMS Admin Dashboard for this product.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mr-auto">
                                        <div class="social text-center">
                                            <button class="btn btn-just-icon btn-round btn-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </button>
                                            <button class="btn btn-just-icon btn-round btn-dribbble">
                                                <i class="fa fa-dribbble"></i>
                                            </button>
                                            <button class="btn btn-just-icon btn-round btn-facebook">
                                                <i class="fa fa-facebook"> </i>
                                            </button>
                                            <h4> or be classical </h4>
                                        </div>
                                        <form id="form-register" class="form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-check clo-6">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="profile" id="profile" value="particular" checked>
                                                            Particular
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-6">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="profile" id="profile" value="professional">
                                                            Professional
                                                            <span class="circle">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="form-group-name" class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i id="icon-name" class="material-icons">face</i>
                                                      </span>
                                                    </div>
                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Your name" required>
                                                </div>
                                            </div>
                                            <div id="form-group-email" class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                      </span>
                                                    </div>
                                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div id="form-group-phone" class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">phone</i>
                                                      </span>
                                                    </div>
                                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="+242066712997" required>
                                                </div>
                                            </div>
                                            <div id="form-group-address" class="form-group">

                                            </div>
                                            <div id="form-group-password" class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                    </div>
                                                    <input  id="password" name="password" type="password" placeholder="Password" class="form-control" required />
                                                </div>
                                            </div>
                                            <!--div id="form-group-c-password" class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                      </span>
                                                    </div>
                                                    <input  id="c-password" name="c-password" type="password" placeholder="Confirm Password" class="form-control" />
                                                </div>
                                            </div-->
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="cgu" class="form-check-input" type="checkbox" value="" required checked>
                                                    <span class="form-check-sign">
                                                      <span class="check"></span>
                                                    </span>
                                                    I agree to the <a href="javascript:void(0)">terms and conditions</a>.
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="link-register-data" class="btn btn-primary btn-round">Get Started</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('template.cli.partials.footer.footer')
        </div>

    </div>
@endsection

@section('footer')
@endsection

@section('script')
    @include('template.cli.partials.script.script')
@endsection
