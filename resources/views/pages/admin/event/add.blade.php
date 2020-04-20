@extends('template.cli.layout')

@section('head')
    @include('template.cli.partials.header.head')
@endsection

@section('nav')
    @include('template.cli.partials.nav.nav')
@endsection

@section('content')
    <script>
        function encodeImageFileAsURL() {
            var filesSelected = document.getElementById("event-principal-image").files;
            if (filesSelected.length > 0) {
                var fileToLoad = filesSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function (fileLoadedEvent) {
                    var srcData = fileLoadedEvent.target.result; // <--- data: base64
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    //document.getElementById("imgTest").innerHTML = newImage.outerHTML;
                    //alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
                    //console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
                    //console.log(srcData);
                    //return srcData;
                    $('#event-image').val(srcData);
                    $("#preview-image").attr("src", srcData);
                };
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
    <div class="page-header header-filter" data-parallax="true" filter-color="rose"
         style="background-image: url('../assets/img/bg6.jpg');">
        <div class="container">
            <div class="row title-row">
                <div class="col-md-4 ml-auto">
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <h3 class="title text-center"> Preview </h3>
                        <input id="event-id" type="hidden" value="">
                        <div class="card card-blog">
                            <div class="card-header card-header-image">
                                <a href="javascript:void(0)" class="add-view">
                                    <img id="preview-image" class="img"
                                         src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg">
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 id="preview-type" class="card-category text-info">Category</h6>
                                <h4 class="card-title" class="add-view">
                                    <a id="preview-title" href="javascript:void(0)">Title</a>
                                </h4>
                                <p id="preview-desc" class="card-description">Description</p>
                            </div>
                            <div class="card-footer ">
                                <div class="author">
                                    <a href="javascript:void(0)">
                                        <img src="assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                        <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                    </a>
                                </div>
                                <div class="stats ml-auto">
                                    <i class="material-icons">schedule</i>
                                    <p id="preview-date"> 28 Dec 2019 </p>&nbsp;
                                    <p id="preview-time"> 23h : 03</p>
                                </div>
                            </div>
                        </div>
                        <!--div class="tab-content">
                            <div class="tab-pane " id="product-page1">
                                <img src="../assets/img/examples/product1.jpg">
                            </div>
                            <div class="tab-pane active" id="product-page2" style="height: 400px; width: 400px;">
                                <img src="../assets/img/examples/product2.jpg" style="height: 400px; max-width: 400px;">
                            </div>
                            <div class="tab-pane" id="product-page3">
                                <img src="../assets/img/examples/product3.jpg">
                            </div>
                            <div class="tab-pane" id="product-page4">
                                <img src="../assets/img/examples/product4.jpg">
                            </div>
                        </div-->
                        <!--ul class="nav flexi-nav" data-tabs="tabs" id="flexiselDemo1">
                            <li class="nav-item">
                                <a href="#product-page1" class="nav-link" data-toggle="tab">
                                    <img src="../assets/img/examples/product1.jpg">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-page2" class="nav-link" data-toggle="tab">
                                    <img src="../assets/img/examples/product2.jpg">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-page3" class="nav-link" data-toggle="tab">
                                    <img src="../assets/img/examples/product3.jpg">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-page4" class="nav-link" data-toggle="tab">
                                    <img src="../assets/img/examples/product4.jpg">
                                </a>
                            </li>
                        </ul-->
                    </div>
                    <div class="col-md-7 col-sm-6">
                        <form id="add-event-form" class="form">
                            @csrf
                            <h3 class="title text-center"> Inputs </h3>
                            <!--h3 class="main-price">$335</h3-->


                            <div class="container">
                                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                                    <li class="nav-item">
                                        <a id="nav-one" class="nav-link active" href="#tab-one" role="tab"
                                           data-toggle="tab">
                                            <i class="material-icons">dashboard</i>
                                            First Informations
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="nav-two" class="nav-link " href="#tab-two" role="tab" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Date and Location
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="nav-three" class="nav-link" href="#tab-three" role="tab"
                                           data-toggle="tab">
                                            <i class="material-icons">photo_library</i>
                                            Images
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="nav-four" class="nav-link" href="#tab-four" role="tab" data-toggle="tab">
                                            <i class="material-icons">list</i>
                                            Others
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-space">
                                    <div class="tab-pane active" id="tab-one">
                                        <div class="card card-collapse">
                                            <!--collapse show-->
                                            <div id="collapseOne" class="collapse show" role="tabpanel"
                                                 aria-labelledby="headingOne"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <div class="form-group row col-sm-12">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="material-icons">face</i>
                                                                                </span>
                                                                </div>
                                                                <select id="change-type" class="selectpicker "
                                                                        data-style="select-with-transition"
                                                                        data-size="7" required="true">
                                                                    <option value="0">Choose Your Type Event</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="material-icons">face</i>
                                                                                </span>
                                                                </div>
                                                                <input id="event-title" name="event-title" type="text"
                                                                       class="form-control"
                                                                       placeholder="Title Event..." value="Title"
                                                                       required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="material-icons">face</i>
                                                                                </span>
                                                                </div>
                                                                <input id="event-desc" name="event-desc" type="text"
                                                                       class="form-control"
                                                                       placeholder="Desc Event..." value="Description"
                                                                       required="true">
                                                                <!--div class="form-group label-floating bmd-form-group">
                                                                    <label class="form-control-label bmd-label-floating" for="message"> Desc Event...</label>
                                                                    <textarea id="event-desc" name="event-desc" class="form-control" rows="3"></textarea>
                                                                </div-->
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-two">
                                        <div class="card card-collapse">
                                            <div id="collapseTwo" class="collapse show" role="tabpanel"
                                                 aria-labelledby="headingTwo"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <div class="row">
                                                            <div class="form-group row col-sm-6">
                                                                <div class="input-group">
                                                                    <a href="#" id="event-date"
                                                                       class="dropdown-toggle nav-link"
                                                                       data-toggle="dropdown">
                                                                        <span id="span-date"
                                                                              class="filter-option-data-range"></span>
                                                                    </a>
                                                                    <input type="text" id="add-time-start">
                                                                    <input type="text" id="add-time-end">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row col-sm-6">
                                                                <select id="change-city" class="selectpicker "
                                                                        data-style="select-with-transition"
                                                                        data-size="7" required="true">
                                                                    <option value="0">Choose Your City</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group row col-sm-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="material-icons">room</i>
                                                                        </span>
                                                                    </div>
                                                                    <input id="event-location" name="event-location"
                                                                           type="text" class="form-control"
                                                                           placeholder="Location Event..."
                                                                           value="12 Annaba" required="true">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row col-sm-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="material-icons">alarm</i>
                                                                        </span>
                                                                    </div>
                                                                    <input id="event-time" name="event-time" type="time"
                                                                           class="form-control"
                                                                           placeholder="Time Event..." value="12:30"
                                                                           required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-three">
                                        <div class="card card-collapse">
                                            <div id="collapseThree" class="collapse show" role="tabpanel"
                                                 aria-labelledby="headingThree"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    <style>
                                                        .upload-btn-wrapper input[type=file] {
                                                            font-size: 100px;
                                                            position: absolute;
                                                            left: 0;
                                                            top: 0;
                                                            opacity: 0;
                                                        }
                                                    </style>
                                                    <div class="upload-btn-wrapper"
                                                         style="position: relative; overflow: hidden; display: inline-block;">
                                                        <button class="btn"
                                                                style="border: 2px solid gray; color: gray;
                                                                        background-color: white;padding: 8px 20px;border-radius: 8px;
                                                                        font-size: 20px; font-weight: bold;">Upload a
                                                            file
                                                        </button>
                                                        <input type="hidden" id="event-image" name="event-image">
                                                        <input type="file" id="event-principal-image"
                                                               name="event-principal-image"
                                                               onchange="encodeImageFileAsURL(this)"/>
                                                    </div>

                                                    <!--input type="file" id="myfile" name="myfile"-->
                                                    <div
                                                        class="form-group form-file-upload form-file-multiple bmd-form-group">
                                                        <input type="file" multiple="" class="inputFileHidden"
                                                               id="" name="">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control inputFileVisible"
                                                                   placeholder="Principal Image...">
                                                            <span class="input-group-btn">
                                                                            <button type="button"
                                                                                    class="btn btn-link btn-fab btn-primary">
                                                                              <i class="material-icons">attach_file</i>
                                                                            <div
                                                                                class="ripple-container"></div></button>
                                                                          </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group form-file-upload form-file-multiple bmd-form-group">
                                                        <input type="file" multiple="" class="inputFileHidden"
                                                               id="event-others-images" name="event-others-images">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control inputFileVisible"
                                                                   placeholder="Others Images Max 4..." multiple="">
                                                            <span class="input-group-btn">
                                                            <button type="button" class="btn btn-link btn-fab btn-info">
                                                              <i class="material-icons">layers</i>
                                                            </button>
                                                          </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-4 col-sm-4">
                                                            <legend>Regular Image</legend>
                                                            <div class="fileinput fileinput-new text-center"
                                                                 data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img
                                                                        src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/image_placeholder.jpg"
                                                                        alt="...">
                                                                </div>
                                                                <div
                                                                    class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                <div>
									<span class="btn btn-rose btn-round btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="..."/>
									</span>
                                                                    <a href="#pablo"
                                                                       class="btn btn-danger btn-round fileinput-exists"
                                                                       data-dismiss="fileinput"><i
                                                                            class="fa fa-times"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 col-sm-4">
                                                            <legend>Avatar</legend>
                                                            <div class="fileinput fileinput-new text-center"
                                                                 data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail img-circle">
                                                                    <img
                                                                        src="https://demos.creative-tim.com/bs3/material-dashboard-pro/assets/img/placeholder.jpg"
                                                                        alt="...">
                                                                </div>
                                                                <div
                                                                    class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                                <div>
									<span class="btn btn-round btn-rose btn-file">
										<span class="fileinput-new">Add Photo</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="..."/></span>
                                                                    <br/>
                                                                    <a href="#pablo"
                                                                       class="btn btn-danger btn-round fileinput-exists"
                                                                       data-dismiss="fileinput"><i
                                                                            class="fa fa-times"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-four">
                                        <div class="card card-collapse">
                                            <div id="collapseFour" class="collapse show" role="tabpanel"
                                                 aria-labelledby="headingFour"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul>
                                                        <div class="form-group row ">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fa fa-link"></i>
                                                                                </span>
                                                                </div>
                                                                <input id="event-web-site" name="event-web-site"
                                                                       type="url" class="form-control"
                                                                       value="https://www.google.com/"
                                                                       placeholder="Your Web Site...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fa fa-facebook-f"></i>
                                                                                </span>
                                                                </div>
                                                                <input id="event-facebook" name="event-facebook"
                                                                       type="url" class="form-control"
                                                                       value="https://www.facebook.com/"
                                                                       placeholder="Your Page Facebook..." required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fa fa-instagram"></i>
                                                                                </span>
                                                                </div>
                                                                <input id="event-instagram" name="event-instagram"
                                                                       type="url" class="form-control"
                                                                       value="https://www.instagram.com/"
                                                                       placeholder="Your Page Instagram..." required>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pick-size">
                                <!--div class="col-md-6 col-sm-6">
                                    <label>Select color</label>
                                    <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                        <option value="1">Rose </option>
                                        <option value="2">Gray</option>
                                        <option value="3">White</option>
                                    </select>
                                </div-->
                                <!--div class="col-md-6 col-sm-6">
                                    <label>Select size</label>
                                    <select class="selectpicker" data-style="select-with-transition" data-size="7">
                                        <option value="1">Small </option>
                                        <option value="2">Medium</option>
                                        <option value="3">Large</option>
                                    </select>
                                </div-->
                            </div>
                            <div class="container row ">
                                <div class="col-md-2 ml-auto mr-auto">
                                    <input id="input-tab-pos" value="0" type="text">
                                    <button id="event-send-data" rel="tooltip" class="btn btn-rose btn-round"
                                            data-original-title="" title="">Next
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="features text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <h4 class="info-title">2 Days Delivery </h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Refundable Policy</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">favorite</i>
                            </div>
                            <h4 class="info-title">Popular Item</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each
                                one. A paragraph describing a feature will be enough.</p>
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
