<div class="card">
    @foreach($forms_field as $i => $field)
        <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapse{{++$i}}">
                Field #{{$i}}
            </a>
        </div>
        <div id="collapse{{$i}}" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div id="cont">
                    <h2 class="hidden">&nbsp;</h2>

                    <div class="form-group {{ $errors->first($field->input_name, 'has-error') }}">
                        <div class="row">
                            <label for="{{$field->input_id}}" class="col-sm-2 control-label">@lang($field->label_title) *</label>
                            <div class="col-sm-10">
                                <input id="{{$field->input_id}}" name="{{$field->input_name}}" type="{{$field->input_type}}" placeholder="Enter the @lang($field->label_title)"
                                       class="form-control required"   value="{!! old($field->input_name) !!}" />
                                {!! $errors->first($field->input_name, '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
