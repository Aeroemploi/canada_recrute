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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" media="all"
          href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/solid.min.css')}}">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/landing-page.css') }}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <!-- Our project just needs Font Awesome Solid + Brands -->
    <script defer src="{{asset('js/solid.js')}}"></script>
    <script defer src="{{asset('js/fontawesome.js')}}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5bc4aec361d0b77092514a51/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@stop
@section('content')
    <!-- Notifications -->
    <div id="notific">
        @include('notifications')
    </div>
    <header class="top">
        <div class="container">
            <div class="row hastag">
                <div class="col-sm-6">
                    <a class="wrap-img-logo"
                       href="/">
                        <h2>
                            <span>#@lang('welcome/text.header.canada')</span>@lang('welcome/text.header.recrute') <span><img
                                        src="{{asset('assets/images/feuille.png')}}" alt="feuille canada"></span>
                        </h2>
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="nav d-flex align-items-center">
                        <a target="_blank" class="fb" href="https://www.facebook.com/canadarecrute/"><i class="fab fa-facebook"></i></a>
                        <a target="_blank" href="https://auray.com/nous-joindre/">@lang('welcome/text.header.contact')</a>
                        @include('includes.language')
                    </div>
                </div>
            </div>
                <div class="canada_dare text-center">
                    <h1>
                        @lang('welcome/text.header.dare')
                    </h1>
                </div>
        </div>
    </header>
    <!-- desktop -->
    <section class="parallax-top" data-parallax="scroll"
             data-image-src="../uploads/headers/quebec.jpeg"
             data-z-index="0">
             </section>
    <section class="about">
        <div class="container">
            <header>
                <h2>
                    @lang('welcome/text.about.content')
                </h2>
            </header>
        </div>
    </section>
    <section class="parallax d-none d-sm-flex" data-parallax="scroll"
             data-image-src="../uploads/headers/bg_parallax.jpg"
             data-z-index="0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8">
                    <div class="wrap">
                        <div class="inner">
                            <div class="decoration">
                                <img src="{{asset('assets/images/letter.png')}}" alt="">
                            </div>
                            <div class="header">
                                <h3>
                                    @lang('welcome/text.recruitment')
                                </h3>
                            </div>
                            <div class="form-container">
                                <form action="{{ route('simple.register') }}" method="POST"
                                      enctype="multipart/form-data"
                                      id="reg_form">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }} name">
                                        <label class="sr-only"> @lang('welcome/text.form.firstname')</label>
                                        <input type="text" class="form-control" id="first_name"
                                               name="first_name"
                                               placeholder="@lang('welcome/text.form.firstname')"
                                               value="{!! old('first_name') !!}">
                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }} name">
                                        <label class="sr-only"> @lang('welcome/text.form.lastname')</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               placeholder="@lang('welcome/text.form.lastname')"
                                               value="{!! old('last_name') !!}">
                                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group email{{ $errors->first('email', 'has-error') }}">
                                        <label class="sr-only"> @lang('welcome/text.form.email')</label>
                                        <input type="email" class="form-control" id="Email" name="email"
                                               placeholder="@lang('welcome/text.form.email')"
                                               value="{!! old('email') !!}">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group files {{ $errors->first('file', 'has-error') }}">
                                        <div class="file">
                                            <label class="control-label">@lang('welcome/text.form.file_upload')</label>
                                        </div>
                                        <div class="input-text">
                                            <div class="preview_image">
                                                <img id="image_upload_preview" width="300" src="" alt="">
                                            </div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <!-- <span class="fileinput-new">@lang('welcome/text.form.control.select')
                                                    &nbsp;&nbsp;</span>-->
                                            <!--<span class="fileinput-exists">@lang('welcome/text.form.control.change')</span>-->
                                                <input id="pic" name="file" type="file" class="form-control"/>
                                                <button id="remove" type="button"
                                                        class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">@lang('welcome/text.form.control.remove')</button>
                                            </div>
                                        </div>
                                        {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group checkbox {{ $errors->first('subscribed', 'has-error') }} ">
                                        <label>
                                            <input type="checkbox"
                                                   name="subscribed"> @lang('welcome/text.form.terms')<a
                                                    href="#"> @lang('welcome/text.form.conditions')</a>
                                        </label>
                                        <br/>
                                        {!! $errors->first('subscribed', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <button type="submit" class="btn"
                                            style="width:150px; color: #816104; background:#ffffff; margin-bottom: 15px;">@lang('welcome/text.form.signup')</button>
                                <!-- @lang('welcome/text.form.alreadyexist') <a href="{{ route('login') }}"> @lang('welcome/text.form.login')</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !desktop -->
    <!-- mobil -->
    <section class="parallax d-block d-sm-none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8">
                    <div class="wrap">
                        <div class="inner">
                            <div class="decoration">
                                <img src="{{asset('assets/images/letter.png')}}" alt="">
                            </div>
                            <div class="header">
                                <h3>
                                    @lang('welcome/text.recruitment')
                                </h3>
                            </div>
                            <div class="form-container">
                                <form action="{{ route('simple.register') }}" method="POST"
                                      enctype="multipart/form-data"
                                      id="reg_form">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }} name">
                                        <label class="sr-only"> @lang('welcome/text.form.firstname')</label>
                                        <input type="text" class="form-control" id="first_name"
                                               name="first_name"
                                               placeholder="@lang('welcome/text.form.firstname')"
                                               value="{!! old('first_name') !!}">
                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }} name">
                                        <label class="sr-only"> @lang('welcome/text.form.lastname')</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               placeholder="@lang('welcome/text.form.lastname')"
                                               value="{!! old('last_name') !!}">
                                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group email{{ $errors->first('email', 'has-error') }}">
                                        <label class="sr-only"> @lang('welcome/text.form.email')</label>
                                        <input type="email" class="form-control" id="Email" name="email"
                                               placeholder="@lang('welcome/text.form.email')"
                                               value="{!! old('email') !!}">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group files {{ $errors->first('file', 'has-error') }}">
                                        <div class="file">
                                            <label class="control-label">@lang('welcome/text.form.file_upload')</label>
                                        </div>
                                        <div class="input-text">
                                            <div class="preview_image">
                                                <img id="image_upload_preview" width="300" src="" alt="">
                                            </div>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <!-- <span class="fileinput-new">@lang('welcome/text.form.control.select')
                                                    &nbsp;&nbsp;</span>-->
                                            <!--<span class="fileinput-exists">@lang('welcome/text.form.control.change')</span>-->
                                                <input id="pic" name="file" type="file" class="form-control"/>
                                                <button id="remove" type="button"
                                                        class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">@lang('welcome/text.form.control.remove')</button>
                                            </div>
                                        </div>
                                        {!! $errors->first('file', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group checkbox {{ $errors->first('subscribed', 'has-error') }} ">
                                        <label>
                                            <input type="checkbox"
                                                   name="subscribed"> @lang('welcome/text.form.terms')<a
                                                    href="#"> @lang('welcome/text.form.conditions')</a>
                                        </label>
                                        <br/>
                                        {!! $errors->first('subscribed', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <button type="submit" class="btn"
                                            style="width:150px; color: #816104; background:#ffffff; margin-bottom: 15px;">@lang('welcome/text.form.signup')</button>
                                <!-- @lang('welcome/text.form.alreadyexist') <a href="{{ route('login') }}"> @lang('welcome/text.form.login')</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !mobil -->
    <section class="jobs">
        <div class="container">
            <header>
                    <h2>
                        @lang('welcome/text.avail_job')
                    </h2>
            </header>
            <div id="text-block-12" class="row indeed-jobs justify-content-center">
                @foreach($jobs as $job)
                    <article class="job col-xs-12 col-sm-6 col-md-4">
                        <a class="job-title" target="_blank"
                           href="{{ $job->link }}"
                           title="{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}">
                            <strong>{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}</strong>
                            <br>
                            <span>{{ $job->location }}
                                &nbsp;&nbsp;|&nbsp;&nbsp;{{ trans('welcome/' . \App\Job::JOBS_TYPES[$job->job_type]) }}</span>
                            <br>
                            <p
                                    class="apply"
                                    title="{{ (app()->getLocale() == 'fr')? $job->job_title_fr : $job->job_title_en }}">@lang('welcome/text.apply')
                            </p>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section class="parallax-small" data-parallax="scroll" data-image-src="../uploads/headers/bandeau_accueil_v2.jpg"
             data-z-index="0">
        <div class="container">
            <header>
                <h2>
                    @lang('welcome/text.footer.impatient')
                </h2>
            </header>
        </div>
    </section>
@stop
@section('footer')
    <div class="container">
        <div class="row">
            <div class="wrap-content-footer">
                <div class="col-sm-3">
                    <a target="_blank" class="d-block" href="https://auray.com/">
                        <img class="img-fluid" src="{{ asset('assets/images/auray_sourcing_blanc_fr.png') }}"
                             alt="auray sourcing"/>
                    </a>
                </div>
                <div class="col-sm-4">
                    <div class="wrap-img">
                        <img class="img-fluid" src="{{asset('assets/images/logo_raymonchabot_fr.png')}}" alt="">
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="auray_sourcing ">
                <p class="">
                    @lang('welcome/text.propulse_by')
                </p>
                <img class=" img-fluid" src="{{asset('assets/images/Logo_aero_blanc.png')}}" alt="">
            </div>
        </div>
        <div class="col">
            <div class="copy">
                <p>
                    © <?php echo date('Y');?> @lang('welcome/text.footer.copy')
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
