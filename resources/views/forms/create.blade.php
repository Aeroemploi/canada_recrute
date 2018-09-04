@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add User
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/forms.css') }}" rel="stylesheet" type="text/css" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Add New Template</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Forms</a></li>
            <li class="active">Add New Form</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 my-3">
                <div class="card panel-primary">
                    <div class="card-heading">
                        <h3 class="card-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New Form
                        </h3>
                        <span class="float-right clickable">
                                    <i class="fa fa-chevron-up"></i>
                                </span>
                    </div>
                    <div class="card-body">
                        <!--main content-->
                        <form id="Form" action="{{ route('forms.store') }}"
                              method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input id="iteration" type="hidden" name="_iteration" value="1" />

                            <div id="rootwizard">
                                <div class="accordion">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseBasic">
                                            Basic form info
                                        </a>
                                    </div>
                                    <div id="collapseBasic" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <div id="cont">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group {{ $errors->first('base_form_id', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="base_form_id" class="col-sm-2 control-label">Select base form Id *</label>
                                                        <div class="col-sm-10">
                                                            <input id="base_form_id" name="base_form_id" type="text" placeholder="Enter the form id"
                                                                   class="form-control required"   value="{!! old('base_form_id') !!}" />
                                                            {!! $errors->first('base_form_id', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('route', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="route" class="col-sm-2 control-label">Enter the route *</label>
                                                        <div class="col-sm-10">
                                                            <input id="route" name="route" type="text" placeholder="Enter the Route"
                                                                   class="form-control required"   value="{!! old('route') !!}" />
                                                            {!! $errors->first('route', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('method', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="method" class="col-sm-2 control-label">Enter the method *</label>
                                                        <div class="col-sm-10">
                                                            <input id="method" name="method" type="text" placeholder="Enter the method"
                                                                   class="form-control required"   value="{!! old('method') !!}" />
                                                            {!! $errors->first('method', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('form_identifier', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="form_identifier" class="col-sm-2 control-label">Enter the form identifier *</label>
                                                        <div class="col-sm-10">
                                                            <input id="form_identifier" name="form_identifier" type="text" placeholder="Enter the form identifier"
                                                                   class="form-control required"   value="{!! old('form_identifier') !!}" />
                                                            {!! $errors->first('form_identifier', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('form_enctype', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="form_enctype" class="col-sm-2 control-label">Enter the form enctype *</label>
                                                        <div class="col-sm-10">
                                                            <input id="form_enctype" name="form_enctype" type="text" placeholder="Enter the form enctype"
                                                                   class="form-control required"   value="{!! old('form_enctype') !!}" />
                                                            {!! $errors->first('form_enctype', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('form_header_fr', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="form_header_fr" class="col-sm-2 control-label">Enter the form header (fr) *</label>
                                                        <div class="col-sm-10">
                                                            <input id="form_header_fr" name="form_header_fr" type="text" placeholder="Enter the form header (fr)"
                                                                   class="form-control required"   value="{!! old('form_header_fr') !!}" />
                                                            {!! $errors->first('form_header_fr', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->first('form_header_en', 'has-error') }}">
                                                    <div class="row">
                                                        <label for="form_header_en" class="col-sm-2 control-label">Enter the form header (en) *</label>
                                                        <div class="col-sm-10">
                                                            <input id="form_header_en" name="form_header_en" type="text" placeholder="Enter the form header (en)"
                                                                   class="form-control required"   value="{!! old('form_header_en') !!}" />
                                                            {!! $errors->first('form_header_en', '<span class="help-block">:message</span>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                Field #1
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div id="cont">
                                                    <h2 class="hidden">&nbsp;</h2>

                                                    <div class="form-group {{ $errors->first('form_id_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="form_id_1" class="col-sm-2 control-label">Select form Id *</label>
                                                            <div class="col-sm-10">
                                                                <input id="form_id_1" name="form_id_1" type="text" placeholder="Enter the form id"
                                                                       class="form-control required"   value="{!! old('form_id_1') !!}" />
                                                                {!! $errors->first('form_id_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->first('input_id_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="input_id_1" class="col-sm-2 control-label">Select input Id *</label>
                                                            <div class="col-sm-10">
                                                                <input id="input_id_1" name="input_id_1" type="text" placeholder="Enter the input id"
                                                                       class="form-control required"   value="{!! old('input_id_1') !!}" />
                                                                {!! $errors->first('input_id_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->first('input_type_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="input_type_1" class="col-sm-2 control-label">Select input type *</label>
                                                            <div class="col-sm-10">
                                                                <input id="input_type_1" name="input_type_1" type="text" placeholder="Enter the input type"
                                                                       class="form-control required"   value="{!! old('input_type_1') !!}" />
                                                                {!! $errors->first('input_type_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->first('input_name_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="input_name_1" class="col-sm-2 control-label">Select input name *</label>
                                                            <div class="col-sm-10">
                                                                <input id="input_name_1" name="input_name_1" type="text" placeholder="Enter the input name"
                                                                       class="form-control required"   value="{!! old('input_name_1') !!}" />
                                                                {!! $errors->first('input_name_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->first('label_title_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="label_title_1" class="col-sm-2 control-label">Select label title *</label>
                                                            <div class="col-sm-10">
                                                                <input id="label_title_1" name="label_title_1" type="text" placeholder="Enter the label title"
                                                                       class="form-control required"   value="{!! old('label_title_1') !!}" />
                                                                {!! $errors->first('label_title_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->first('primary_color_1', 'has-error') }}">
                                                        <div class="row">
                                                            <label for="primary_color_1" class="col-sm-2 control-label">Select primary color *</label>
                                                            <div class="col-sm-10">
                                                                <input id="primary_color_1" name="primary_color_1" type="text" placeholder="Enter the primary color"
                                                                       class="form-control required"   value="{!! old('primary_color_1') !!}" />
                                                                {!! $errors->first('primary_color_1', '<span class="help-block">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="options">
                                        <button class="btn btn-success">Save</button>
                                        <a href='#'><i class="livicon" data-name="plus" data-size="40" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="add another field"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(init_forms);
        var iteration=1;

        function init_forms() {
            $('.options a').on('click', addAnotherField);
        }

        function addAnotherField() {
            iteration++;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url : "{{route('forms.controls')}}",
                data : { 'numberOfElement': iteration },
                success : function (data) {
                    console.log('success');
                    $(".accordion").append(data);
                    $("#iteration").attr('value', iteration);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>
@stop
