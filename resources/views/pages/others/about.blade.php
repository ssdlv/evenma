@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/bg0.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">About Us</h1>
                    <!--h4>Meet the amazing team behind this project and find out more about how we work.</h4-->
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="about-description text-center" style="padding-top: 30px;">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <!--Text Correct-->
                        <h5 class="description">Meet the amazing team behind this project and find out more about how we work.</h5>
                        <!--h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5-->
                    </div>
                </div>
            </div>
            <div class="about-team team-1" style="padding: 0px;">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <!--Text Correct-->
                        <h2 class="title">Our fiery team!</h2>
                        <h5 class="description">You are the key to the success of the event. By donating your time, you allow the community to participate in great events while being affordable. Our success comes back to you, thank you for your invaluable.</h5>
                    </div>
                </div>
                <div class="row" id="list-team">
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar txt-center">
                                <a href="#pablo">
                                    <img class="img rounded-circle" style="width: 130px" src="../assets/img/faces/marc.jpg">
                                </a>
                            </div>
                            <div class="card-body txt-center">
                                <h4 class="card-title">Alec Thompson</h4>
                                <h6 class="category text-muted">CEO / Co-Founder</h6>
                                <p class="card-description">
                                    And I love you like Kanye loves Kanye. We need to restart the human foundation.
                                </p>
                            </div>
                            <div class="card-footer justify-content-center">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar txt-center">
                                <a href="#pablo">
                                    <img class="img rounded-circle" style="width: 130px" src="../assets/img/faces/kendall.jpg">
                                </a>
                            </div>
                            <div class="card-body txt-center">
                                <h4 class="card-title">Tania Andrew</h4>
                                <h6 class="category text-muted">Designer</h6>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation. And I love you like Kanye loves Kanye.
                                </p>
                            </div>
                            <div class="card-footer justify-content-center">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar txt-center">
                                <a href="#pablo">
                                    <img class="img rounded-circle" style="width: 130px" src="../assets/img/faces/christian.jpg">
                                </a>
                            </div>
                            <div class="card-body txt-center">
                                <h4 class="card-title">Christian Mike</h4>
                                <h6 class="category text-muted">Web Developer</h6>
                                <p class="card-description">
                                    I love you like Kanye loves Kanye. Don't be scared of the truth because we need to restart the human foundation.
                                </p>
                            </div>
                            <div class="card-footer justify-content-center">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook"><i class="fa fa-facebook-square"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar txt-center">
                                <a href="#pablo">
                                    <img class="img rounded-circle" style="width: 130px" src="../assets/img/faces/avatar.jpg">
                                </a>
                            </div>
                            <div class="card-body txt-center">
                                <h4 class="card-title">Rebecca Stormvile</h4>
                                <h6 class="category text-muted">Web Developer</h6>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation.
                                </p>
                            </div>
                            <div class="card-footer justify-content-center">
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-google"><i class="fa fa-google"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-services features-2">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <!--Text Correct-->
                        <h2 class="title">We help you promote your events</h2>
                        <h5 class="description">Evenma is the reflection of your wildest dreams. Concerned with your satisfaction, we are committed to working with your standards by understanding your expectations and your business reality. Give us the means to promote your custom event.</h5>
                    </div>
                </div>
                <!--div class="row">
                    <div class="col-md-4">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">gesture</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">1. Design</h4>
                                <p>The moment you use Material Kit, you know you&#x2019;ve never felt anything like it. With a single use, this powerfull UI Kit lets you do more than ever before. </p>
                                <a href="#pablo">Find more...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">build</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">2. Develop</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                <a href="#pablo">Find more...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">mode_edit</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">3. Make Edits</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                <a href="#pablo">Find more...</a>
                            </div>
                        </div>
                    </div>
                </div-->
            </div>
            <div class="about-office">
                <div class="row text-center">
                    <div class="col-md-8 ml-auto mr-auto">
                        <!--Text Correct-->
                        <h2 class="title">Our office is our second home</h2>
                        <h4 class="description">Here are some pictures of our office. You can see that the place looks like a palace and is fully equipped with everything the team needs to support you in your project.</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ asset('files/team/office/office2.jpg') }}">
                    </div>
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ asset('files/team/office/office4.jpg') }}">
                    </div>
                    <div class="col-md-4">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ asset('files/team/office/office3.jpg') }}">
                    </div>
                    <div class="col-md-6">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ asset('files/team/office/office5.jpg') }}">
                    </div>
                    <div class="col-md-6">
                        <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{ asset('files/team/office/office1.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="about-contact">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <!--Text Correct-->
                        <h2 class="text-center title">Want to work with us?</h2>
                        <h4 class="text-center description">Define the details of your event and contact us for any future collaboration. We will get back to you in a few hours.</h4>
                        <form class="contact-form">
                            <!--div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Your name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Your Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">Your Specility</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div-->
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <a href="{{ route('contact') }}" class="btn btn-primary btn-round">
                                        Contact US
                                    </a>
                                </div>
                            </div>
                        </form>
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
