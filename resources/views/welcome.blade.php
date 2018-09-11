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
            height: 805px;

            /* Create the parallax scrolling effect */
            background-size: cover;
        }
        .parallax-small {
            /* The image used */
            background: url("{{ '/uploads/headers/' . $template->background_image }}") #ffffff fixed center no-repeat;

            /* Set a specific height */
            height: 305px;

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
        @include('includes.language')

        <header>
            <div class="container">
                <div class="hastag">
                    <h2>
                        <span>#@lang('welcome/text.header.canada')</span>@lang('welcome/text.header.recrute') <span><img
                                src="{{asset('assets/images/feuille.png')}}" alt="feuille canada"></span>
                    </h2>
                </div>
                <div class="canada_dare">
                    <h1>
                        @lang('welcome/text.header.dare')
                    </h1>
                    <span class="subtitle">
                        @lang('welcome/text.header.more_than')
                    </span>
                </div>
            </div>
        </header>

        <div class="parallax ">
            <div>
                @if(app()->getLocale() == 'fr')
                    <h1 class="title">{!! $template->header_title_fr !!}</h1>
                @else
                    <h1 class="title">{!! $template->header_title_en !!}</h1>
                @endif
            </div>

            <div class="parallax_wrapper">
                <div class="wrapper">
                    <div class="inner">
                        <div class="decoration">
                            <img src="{{asset('assets/images/letter.png')}}" alt="">
                        </div>
                        <div class="header">
                            <h2>@lang('welcome/text.recruitment') <br />@lang('welcome/text.time', [ 'from' => '7:00am', 'to' => '7:00pm'])</h2>
                        </div>
                        <div class="form-container">
                            <form action="{{ route('simple.register') }}" method="POST" enctype="multipart/form-data" id="reg_form">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group {{ $errors->first('first_name', 'has-error') }} name">
                                    <label class="sr-only"> @lang('welcome/text.form.firstname')</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="@lang('welcome/text.form.firstname')"
                                           value="{!! old('first_name') !!}" >
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('last_name', 'has-error') }} name">
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
                                <!--<div class="form-group {{ $errors->first('password', 'has-error') }}">
                                    <label class="sr-only"> @lang('welcome/text.form.password')</label>
                                    <input type="password" class="form-control" id="Password1" name="password" placeholder="@lang('welcome/text.form.password')">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                    <label class="sr-only"> @lang('welcome/text.form.confirmpassword')</label>
                                    <input type="password" class="form-control" id="Password2" name="password_confirm"
                                           placeholder="@lang('welcome/text.form.confirmpassword')">
                                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                </div>-->
                                <div class="clearfix"></div>
                                <div class="form-group {{ $errors->first('file', 'has-error') }}">
                                    <div class="file">
                                        <label class="control-label">@lang('welcome/text.form.file_upload')</label>
                                    </div>
                                    <div class="input-text">
                                        <div class="preview_image">
                                            <img id="image_upload_preview" width="300" src="" alt="">
                                        </div>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="fileinput-new">@lang('welcome/text.form.control.select')&nbsp;&nbsp;</span>
                                            <!--<span class="fileinput-exists">@lang('welcome/text.form.control.change')</span>-->
                                            <input id="pic" name="file" type="file" class="form-control"/>
                                            <button id="remove" type="button" class="btn btn-outline-danger fileinput-exists"
                                               data-dismiss="fileinput">@lang('welcome/text.form.control.remove')</button>
                                        </div>
                                    </div>
                                    {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
                                </div>
                                <div class="form-group checkbox {{ $errors->first('subscribed', 'has-error') }} ">
                                    <label>
                                        <input type="checkbox" name="subscribed" >  @lang('welcome/text.form.terms')<a href="#"> @lang('welcome/text.form.conditions')</a>
                                    </label>
                                    <br />
                                    {!! $errors->first('subscribed', '<span class="help-block">:message</span>') !!}
                                </div>
                                <button type="submit" class="btn" style="width:150px; color: #816104; background:#ffffff; margin-bottom: 15px;">@lang('welcome/text.form.signup')</button>
                            <!-- @lang('welcome/text.form.alreadyexist') <a href="{{ route('login') }}"> @lang('welcome/text.form.login')</a> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <div class="title-left">
                    @lang('welcome/text.avail_job')
                </div>
                <div class="desc">
                    @if(app()->getLocale() == 'fr')
                        {!! $template->description_fr !!}
                    @else
                        {!! $template->description_en !!}
                    @endif
                </div>
                <div class="jobs">
                    <div class=" vc_custom_1533952339789">
                        <div id="text-block-12" class="mk-text-block   indeed-jobs">
                            @foreach($jobs as $job)
                                <div class="job">
                                    <p><a class="job-title" target="_blank"
                                          href="{{ $job->link }}"
                                          title="{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}"><strong>{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}</strong></a><br><span>{{ $job->location }}&nbsp;&nbsp;|&nbsp;&nbsp;{{ trans('welcome/' . \App\Job::JOBS_TYPES[$job->job_type]) }}</span><br><a
                                            class="apply"
                                            target="_blank"
                                            href="{{ $job->link }}"
                                            title="{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}">@lang('welcome/text.apply')</a></p>
                                </div>
                            @endforeach
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax-small">
            <div>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>
@stop
@section('footer')
    <div class="container">
        <h3>
            @lang('welcome/text.footer.impatient')
        </h3>
        <div>
            <div class="auray_sourcing">
                <p>
                    @lang('welcome/text.propulse_by')
                    <img src="{{ asset('assets/images/auray_sourcing_fr.png') }}" alt="auray sourcing" width="200px" />
                </p>
            </div>
        </div>
    </div>
@stop
@section('footer_scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset_input_field() {
            $("#pic").wrap('<form>').closest('form').get(0).reset();
            $("#pic").unwrap();
            $('#image_upload_preview').attr('src', '');
        }

        $("#pic").change(function () {
            readURL(this);
        });

        $("#remove").on('click', reset_input_field);
    </script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
@stop
