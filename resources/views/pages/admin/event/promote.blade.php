@extends('template.admin.layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="title text-center"> Preview </h3>
                    <input id="event-id" type="hidden" value="">
                    <div class="card card-product">
                        <div class="card-image" data-header-animation="true">
                            <a href="#pablo">
                                <img id="wizardPicturePreview" class="img preview_image" src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/card-3.jpeg">
                            </a>
                        </div>

                        <div class="card-content">
                            <div class="card-actions">
                                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>

                                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">visibility</i>
                                </button>
                                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>

                            <h4 class="card-title">
                                <a id="preview-title" href="javascript:void(0)">Office Studio</a>
                            </h4>
                            <div id="preview-desc" class="card-description">

                                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats pull-left">
                                <!--h4 id="preview-date">$899/night</h4-->
                                <p id="preview-date" class="category">
                                    <i class="material-icons">date_range</i> 02 Mar 2020
                                </p>
                            </div>
                            <div class="stats pull-right">
                                <p id="preview-time" class="category">
                                    <i class="material-icons">alarm</i> 16h : 40
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="col-md-3">
                        <div class="card card-pricing card-plain">
                            <div class="card-content">
                                <h6 class="category">Freelancer</h6>
                                <div class="icon">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <h3 class="card-title">FREE</h3>
                                <p class="card-description">
                                    This is good if your company size is between 2 and 10 Persons.
                                </p>
                                <a href="#pablo" class="btn btn-white btn-round">Choose Plan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/events/promote.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            demo.initMaterialWizard();
            setTimeout(function(){
                $('.card.wizard-card').addClass('active');
            },600);
        });
    </script>

@endsection



