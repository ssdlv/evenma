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
                    <div class="wizard-container active">
                        <div class="card wizard-card" data-color="rose" id="wizardProfile">
                            <form id="formAddEvent" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!--You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Build Your Event
                                    </h3>
                                    <!--h5>This information will let us know more about you.</h5-->
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab">About</a></li>
                                        <li><a href="#account" data-toggle="tab">Images</a></li>
                                        <li><a href="#address" data-toggle="tab">Address</a></li>
                                        <li><a href="#options" data-toggle="tab">Options</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="row">
                                            <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <label class="control-label">Image <small>(required)</small></label>
                                                        <img class="picture-src preview_image" id="wizardPicturePreview" title="" src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg"/>
                                                        <input type="file" name="event-picture0" id="event-picture0">
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Type Event <small>(required)</small></label>
                                                        <select id="event-select-type" name="event-select-type" class="selectpicker txt-center" data-style="select-with-transition" title="Choose Your Type" data-size="7">
                                                            @foreach($types as $type)
                                                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Title <small>(required)</small></label>
                                                        <input id="event-title" name="event-title" type="text" class="form-control" value="Office Studio">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="event-desc" class="control-label">Description <small>(required)</small></label>
                                                        <!--input id="event-desc" name="event-desc" type="text" class="form-control" value="Description"-->
                                                        <textarea required class="form-control" rows="" id="event-desc" name="event-desc"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h4 class="info-text"> What are you doing? (checkboxes) </h4>
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <div class="col-sm-4">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <label class="control-label">Image <small>(required)</small></label>
                                                            <img class="picture-src event-picture1" id="wizardPicturePreview" title="" src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg"/>
                                                            <input type="file" name="event-picture1" id="event-picture1">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <label class="control-label">Image <small>(required)</small></label>
                                                            <img class="picture-src event-picture2" id="wizardPicturePreview" title="" src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg"/>
                                                            <input type="file" name="event-picture2" id="event-picture2">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <label class="control-label">Image <small>(required)</small></label>
                                                            <img class="picture-src event-picture3" id="wizardPicturePreview" title="" src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg"/>
                                                            <input type="file" name="event-picture3" id="event-picture3">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Are you living in a nice area? </h4>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Location</label>
                                                    <input id="event-location" name="event-location" type="text" class="form-control" value="12 Rue Annba Bourgogne">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Time.</label>
                                                    <input id="event-time-start" name="event-time-start" type="time" class="form-control" value="12:30">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Date.</label>
                                                    <input id="event-date-start" name="event-date-start" type="date" class="form-control" value="12:30">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Country</label>
                                                    <select id="event-select-city" name="event-select-city" class="form-control">
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="options">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Are you living in a nice area? </h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Phone Number 1 <small>(required)</small></label>
                                                            <input id="event-option-phone1" name="event-option-phone1" type="text" class="form-control" value="00212700474173">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Phone Number 2 <small>(optional)</small></label>
                                                            <input id="event-option-phone2" name="event-option-phone2" type="text" class="form-control" value="00242066712997">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">link</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Page Facebook <small>(required)</small></label>
                                                            <input id="event-option-facebook" name="event-option-facebook" type="text" class="form-control" value="https://www.facebook.com/">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">link</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Page Instagram <small>(required)</small></label>
                                                            <input id="event-option-instagram" name="event-option-instagram" type="text" class="form-control" value="https://www.instagram.com/">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                        <!--input type='submit' id="add-event-form" class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' /-->
                                        <button id="add-event-form" name='finish' value='Finish' type="submit" rel="tooltip" class="btn btn-finish btn-fill btn-rose btn-wd" data-original-title="" title="">
                                            Finish
                                        </button>
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/events/add.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            demo.initMaterialWizard();
            setTimeout(function(){
                $('.card.wizard-card').addClass('active');
            },600);
        });
    </script>

@endsection



