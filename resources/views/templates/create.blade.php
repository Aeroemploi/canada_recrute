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
            <li><a href="#"> Template</a></li>
            <li class="active">Add New Template</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 my-3">
                <div class="card panel-primary">
                    <div class="card-heading">
                        <h3 class="card-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New Template
                        </h3>
                        <span class="float-right clickable">
                                    <i class="fa fa-chevron-up"></i>
                                </span>
                    </div>
                    <div class="card-body">
                        <!--main content-->
                        <form id="commentForm" action="{{ route('templates.store') }}"
                              method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div id="rootwizard">
                                <ul>
                                    <li class="nav-item"><a href="#tab1" data-toggle="tab" class="nav-link">Template base</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane " id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>

                                        <div class="form-group {{ $errors->first('background_image', 'has-error') }}">
                                            <div class="row">
                                                <label class="col-sm-2 control-label">Background Header picture</label>
                                                <div class="col-sm-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                            <img src="http://placehold.it/200x200" alt="profile pic">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                        <div></div>
                                                        <span class="btn btn-default btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input id="pic" name="background_image" type="file" class="form-control"/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists"
                                                           data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <span class="help-block">{{ $errors->first('background_image', ':message') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('header_title_fr', 'has-error') }}">
                                            <div class="row">
                                                <label for="header_title_fr" class="col-sm-2 control-label">Header Title Fr *</label>
                                                <div class="col-sm-10">
                                                    <input id="header_title_fr" name="header_title_fr" type="text" placeholder="Entrer le titre en français"
                                                           class="form-control required"   value="{!! old('header_title_fr', $template->header_title_fr) !!}" />
                                                    {!! $errors->first('header_title_fr', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('header_title_en', 'has-error') }}">
                                            <div class="row">
                                                <label for="header_title_en" class="col-sm-2 control-label">Header Title En *</label>
                                                <div class="col-sm-10">
                                                    <input id="header_title_en" name="header_title_en" type="text" placeholder="Enter the template Title"
                                                           class="form-control required"   value="{!! old('header_title_en', $template->header_title_en) !!}" />
                                                    {!! $errors->first('header_title_en', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group {{ $errors->first('form_template', 'has-error') }}">
                                            <div class="row">
                                                <label for="form_template" class="col-sm-2 control-label">Template name *</label>
                                                <div class="col-sm-10">
                                                    <input id="form_template" name="form_template" placeholder="Template name" type="text"
                                                           class="form-control"   value="{!! old('form_template') !!}"/>
                                                    {!! $errors->first('form_template', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('description_fr', 'has-error') }}">
                                            <div class="row">
                                                <label for="description_fr" class="col-sm-2 control-label">Description Fr *</label>
                                                <div class="col-sm-10">
                                                <textarea id="description_fr" name="description_fr" placeholder="Votre Description" type="text"
                                                          class="form-control">
                                                    {!! old('description_fr', $template->description_fr) !!}
                                                </textarea>
                                                    {!! $errors->first('description_fr', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('description_en', 'has-error') }}">
                                            <div class="row">
                                                <label for="description_en" class="col-sm-2 control-label">Description  En *</label>
                                                <div class="col-sm-10">
                                                <textarea id="description_en" name="description_en" placeholder="Your Description" type="text"
                                                          class="form-control">
                                                    {!! old('description_en', $template->description_en) !!}
                                                </textarea>
                                                    {!! $errors->first('description_en', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard">
                                        <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                    </ul>
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
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
@stop
