<div class="card">
    <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapse{{$data['numberOfElement']}}">
            Field #{{$data['numberOfElement']}}
        </a>
    </div>
    <div id="collapse{{$data['numberOfElement']}}" class="collapse show" data-parent="#accordion">
        <div class="card-body">
            <div id="cont">
                <h2 class="hidden">&nbsp;</h2>

                <div class="form-group {{ $errors->first('form_id_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="form_id_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select form Id *</label>
                        <div class="col-sm-10">
                            <input id="form_id_{{$data['numberOfElement']}}" name="form_id_{{$data['numberOfElement']}}" type="text" placeholder="Enter the form id"
                                   class="form-control required"   value="{!! old('form_id_' . $data['numberOfElement']) !!}" />
                            {!! $errors->first('form_id_'  . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('input_id_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="input_id_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select input Id *</label>
                        <div class="col-sm-10">
                            <input id="input_id_{{$data['numberOfElement']}}" name="input_id_{{$data['numberOfElement']}}" type="text" placeholder="Enter the input id"
                                   class="form-control required"   value="{!! old('input_id_'. $data['numberOfElement']) !!}" />
                            {!! $errors->first('input_id_' . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('input_type_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="input_type_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select input type *</label>
                        <div class="col-sm-10">
                            <input id="input_type_{{$data['numberOfElement']}}" name="input_type_{{$data['numberOfElement']}}" type="text" placeholder="Enter the input type"
                                   class="form-control required"   value="{!! old('input_type_'. $data['numberOfElement']) !!}" />
                            {!! $errors->first('input_type_' . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('input_name_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="input_name_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select input name *</label>
                        <div class="col-sm-10">
                            <input id="input_name_{{$data['numberOfElement']}}" name="input_name_{{$data['numberOfElement']}}" type="text" placeholder="Enter the input name"
                                   class="form-control required"   value="{!! old('input_name_' . $data['numberOfElement']) !!}" />
                            {!! $errors->first('input_name_' . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('label_title_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="label_title_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select label title *</label>
                        <div class="col-sm-10">
                            <input id="label_title_{{$data['numberOfElement']}}" name="label_title_{{$data['numberOfElement']}}" type="text" placeholder="Enter the label title"
                                   class="form-control required"   value="{!! old('label_title_' . $data['numberOfElement']) !!}" />
                            {!! $errors->first('label_title_' . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->first('primary_color_' . $data['numberOfElement'], 'has-error') }}">
                    <div class="row">
                        <label for="primary_color_{{$data['numberOfElement']}}" class="col-sm-2 control-label">Select primary color *</label>
                        <div class="col-sm-10">
                            <input id="primary_color_{{$data['numberOfElement']}}" name="primary_color_{{$data['numberOfElement']}}" type="text" placeholder="Enter the primary color"
                                   class="form-control required"   value="{!! old('primary_color_' . $data['numberOfElement']) !!}" />
                            {!! $errors->first('primary_color_' . $data['numberOfElement'], '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
