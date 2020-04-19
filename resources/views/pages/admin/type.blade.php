@extends('template.admin.layout')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>

                        <div class="card-header card-header-icon" data-background-color="purple">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addTypeModal">
                                <i class="material-icons">add</i>
                            </a>
                        </div>

                        <div class="card-content">
                            <h4 class="card-title">Simple Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Using</th>
                                        <th class="text-center">Created</th>
                                        <th class="text-center">Updated</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="typesTable">
                                    @foreach($types as $type)
                                        <tr>
                                            <td class="text-center">{{ $type->id }}</td>
                                            <td class="text-center">{{ $type->type_name }}</td>
                                            <td class="text-center">{{ $type->type_using }}</td>
                                            <td class="text-center">{{ $type->type_created }}</td>
                                            <td class="text-center">{{ $type->type_updated }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add New Type-->
    <div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="typeModalLabel">Add New Type</h5>
                    <button type="button" class="close addClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulaire">
                        <!-- #############################  HIDDEN TOKEN CSRF_TOKEN  ##################################-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <input type="hidden" name="event-type-add-id" id="event-type-add-id">
                            <div class="form-group label-floating">
                                <label class="control-label">Designated <small>(required)</small></label>
                                <input id="event-type-add-designated" name="event-type-add-designated" type="text" class="form-control" value="Exposition">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addClose" class="btn btn-danger addClose" data-dismiss="modal">Close</button>
                    <button type="button" id="addTypeSave" class="btn btn-brand">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Edit Type-->
    <div class="modal fade" id="editTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cityModalLabel">Edit Type</h5>
                    <button type="button" class="close addClose" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulaire">
                        <!-- #############################  HIDDEN TOKEN CSRF_TOKEN  ##################################-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">face</i>
                            </span>
                            <input type="hidden" name="event-type-edit-id" id="event-type-edit-id">
                            <div class="form-group label-floating">
                                <label class="control-label">Designated <small>(required)</small></label>
                                <input id="event-type-edit-designated" name="event-city-edit-designated" type="text" class="form-control" value="Office Studio">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addClose" class="btn btn-danger addClose" data-dismiss="modal">Close</button>
                    <button type="button" id="editTypeSave" class="btn btn-brand">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/events/type.js') }}"></script>
@endsection
