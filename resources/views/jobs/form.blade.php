<form id="commentForm" action="{{ $route }}"
      method="POST" enctype="multipart/form-data" class="form-horizontal">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div id="rootwizard">
        <ul>
            <li class="nav-item"><a href="#tab1" data-toggle="tab" class="nav-link">Job</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane " id="tab1">
                <h2 class="hidden">&nbsp;</h2>

                <div class="form-group {{ $errors->first('order_id', 'has-error') }}">
                    <div class="row">
                        <label for="order_id" class="col-sm-2 control-label">Order Number (the lowest the number the higher it's priority) *</label>
                        <div class="col-sm-10">
                            <input id="order_id" name="order_id" placeholder="Order Number" type="text"
                                   class="form-control"   value="{!! old('order_id', $job->order_id) !!}"/>
                            {!! $errors->first('order_id', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('job_title_fr', 'has-error') }}">
                    <div class="row">
                        <label for="job_title_fr" class="col-sm-2 control-label">Job Title Fr *</label>
                        <div class="col-sm-10">
                            <input id="job_title_fr" name="job_title_fr" type="text" placeholder="Enter the Job Title"
                                   class="form-control required"   value="{!! old('job_title_fr', $job->job_title_fr) !!}" />
                            {!! $errors->first('job_title_fr', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('job_title_en', 'has-error') }}">
                    <div class="row">
                        <label for="job_title_en" class="col-sm-2 control-label">Job Title En *</label>
                        <div class="col-sm-10">
                            <input id="job_title_en" name="job_title_en" type="text" placeholder="Enter the Job Title"
                                   class="form-control required"   value="{!! old('job_title_en', $job->job_title_en) !!}" />
                            {!! $errors->first('job_title_en', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('link', 'has-error') }}">
                    <div class="row">
                        <label for="link" class="col-sm-2 control-label">Link *</label>
                        <div class="col-sm-10">
                            <input id="link" name="link" type="text" placeholder="Enter the link"
                                   class="form-control required"   value="{!! old('link', $job->link) !!}" />
                            {!! $errors->first('link', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('location', 'has-error') }}">
                    <div class="row">
                        <label for="location" class="col-sm-2 control-label">Location *</label>
                        <div class="col-sm-10">
                            <input id="location" name="location" type="text" placeholder="Enter the location"
                                   class="form-control required"   value="{!! old('location', $job->location) !!}" />
                            {!! $errors->first('location', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('job_type', 'has-error') }}">
                    <div class="row">
                        <label for="job_type" class="col-sm-2 control-label">Job Type *</label>
                        <div class="col-sm-10">
                            <select name="job_type" id="job_type">
                                <option value="full_time" <?php echo(($job->job_type === 'full_time')? 'selected' : '')  ?>>Full Time</option>
                                <option value="part_time" <?php echo(($job->job_type === 'part_time')? 'selected' : '')  ?>>Part Time</option>
                                <option value="contract" <?php echo(($job->job_type === 'contract')? 'selected' : '')  ?>>Contract</option>
                            </select>
                            {!! $errors->first('job_type', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('is_active', 'has-error') }}">
                    <div class="row">
                        <label class="col-sm-2 control-label">Display visibility?</label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="is_active" id="is_active" class="tgl tgl-light" style="display: none;" <?php echo(($job->is_active)? 'checked' : '')  ?>>
                            <label for="is_active" class="tgl-btn"></label>
                            {!! $errors->first('is_active', '<span class="help-block">:message</span>') !!}
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
