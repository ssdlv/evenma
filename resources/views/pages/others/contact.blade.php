@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <div class="signup-page sidebar-collapse">
        <div class="page-header header-filter clear-filter purple-filter" filter-color="purple" style="background-image: url('../assets/img/bg0.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto" >
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Send us a message</h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="description">You can contact us for more information. We&apos;ll get in touch with you as soon as possible.<br><br>
                                        </p>
                                        <form role="form" id="contact-form" method="post" action="{{ route('contact-add') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="bmd-label-floating">Your name</label>
                                                <input required type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmails" class="bmd-label-floating">Email address</label>
                                                <input required type="email" class="form-control" id="exampleInputEmails" name="email">
                                                <span class="bmd-help">We'll never share your email with anyone else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="bmd-label-floating">Phone</label>
                                                <input required type="text" class="form-control" id="number" name="number">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="form-control-label bmd-label-floating" for="message"> Your message</label>
                                                <textarea required class="form-control" rows="" id="message" name="message"></textarea>
                                            </div>
                                            <div class="submit text-center">
                                                <button id="send-contact-spinner" type="submit" rel="tooltip" class="btn btn-primary btn-raised btn-round" data-original-title="" title="">
                                                    Contact Us
                                                </button>
                                                <!--input id="send-contact" type="button" class="btn btn-primary btn-raised btn-round" value="Contact Us"-->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4 ml-auto">
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">pin_drop</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Find us at the office</h4>
                                                <p> El Kadi Iass Street, nr. 4,<br>
                                                    20000 Casablanca,<br>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">phone</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Give us a ring</h4>
                                                <p> Mariel Evha ABIR<br>
                                                    +212 700 474 173<br>
                                                    Mon - Fri, 8:00-22:00
                                                </p>
                                            </div>
                                        </div>
                                        <div class="info info-horizontal">
                                            <div class="icon icon-primary">
                                                <i class="material-icons">business_center</i>
                                            </div>
                                            <div class="description">
                                                <h4 class="info-title">Legal Information</h4>
                                                <p> Evenma Ltd.<br>
                                                    VAT &#xB7; EN2341241<br>
                                                    IBAN &#xB7; EN8732ENGB2300099123<br>
                                                    Bank &#xB7; Attijariwafa Bank
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
