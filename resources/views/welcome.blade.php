@extends('layouts/basic-layout')

{{-- Page title --}}
@section('title')
    @lang('welcome/text.title')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="all"
          href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/landing-page.css') }}"/>
    <style>
        .parallax {
            /* The image used */
            background: url("{{ '/uploads/headers/' . $template->background_image }}") #ffffff fixed center no-repeat;

            /* Set a specific height */
            height: 300px;

            /* Create the parallax scrolling effect */
            background-size: cover;
        }
    </style>
@stop
@section('content')
    <!-- Notifications -->
    <div id="notific">
        @include('notifications')
    </div>

    <div class="container-fluid">
        <div class="parallax ">
            <div>
                @if(session('locale') == 'fr')
                    <h1 class="title">{{ $template->header_title_fr }}</h1>
                @else
                    <h1 class="title">{{ $template->header_title_en }}</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid">
            <div class="main">
                <div class="header">
                    <h2>@lang('welcome/text.recruitment') <br />@lang('welcome/text.time', [ 'from' => '7:00am', 'to' => '7:00pm'])</h2>
                </div>
                <div class="form-container block">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" id="reg_form">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                            <label class="sr-only"> @lang('welcome/text.form.firstname')</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="@lang('welcome/text.form.firstname')"
                                   value="{!! old('first_name') !!}" >
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                            <label class="sr-only"> @lang('welcome/text.form.lastname')</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="@lang('welcome/text.form.lastname')"
                                   value="{!! old('last_name') !!}" >
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label class="sr-only"> @lang('welcome/text.form.email')</label>
                            <input type="email" class="form-control" id="Email" name="email" placeholder="@lang('welcome/text.form.email')"
                                   value="{!! old('email') !!}" >
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <label class="sr-only"> @lang('welcome/text.form.password')</label>
                            <input type="password" class="form-control" id="Password1" name="password" placeholder="@lang('welcome/text.form.password')">
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                            <label class="sr-only"> @lang('welcome/text.form.confirmpassword')</label>
                            <input type="password" class="form-control" id="Password2" name="password_confirm"
                                   placeholder="@lang('welcome/text.form.confirmpassword')">
                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group {{ $errors->first('file', 'has-error') }}">
                            <div class="row">
                                <label class="col-sm-2 control-label">@lang('welcome/text.form.file_upload')</label>
                                <div class="col-sm-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">@lang('welcome/text.form.control.select')</span>
                                                    <span class="fileinput-exists">@lang('welcome/text.form.control.change')</span>
                                                    <input id="pic" name="file" type="file" class="form-control"/>
                                                </span>
                                        <a href="#" class="btn btn-danger fileinput-exists"
                                           data-dismiss="fileinput">@lang('welcome/text.form.control.remove')</a>
                                    </div>
                                </div>
                            </div>
                            {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="checkbox {{ $errors->first('subscribed', 'has-error') }} ">
                            <label>
                                <input type="checkbox" name="subscribed" >  @lang('welcome/text.form.terms')<a href="#"> @lang('welcome/text.form.conditions')</a>
                            </label>
                            <br />
                            {!! $errors->first('subscribed', '<span class="help-block">:message</span>') !!}
                        </div>
                        <br /><br />
                        <button type="submit" class="btn btn-block btn-primary">@lang('welcome/text.form.signup')</button>
                        <!-- @lang('welcome/text.form.alreadyexist') <a href="{{ route('login') }}"> @lang('welcome/text.form.login')</a> -->
                    </form>
                </div>
            </div>
            <div class="secondary">
                @if(session('locale') == 'fr')
                    {!! $template->description_fr !!}
                @else
                    {!! $template->description_en !!}
                @endif
            </div>
        </div>
    </div>
@stop
@section('footer')
    <h3>
        <em>@lang('welcome/text.footer.excerpt')</em>
    </h3>
    <h3>
        <strong>@lang('welcome/text.footer.conclusion')</strong>
    </h3>
@stop
@section('footer_scripts')
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
@stop
