@layout('layout.main')

@section('content')
    {{ Form::open($action, 'post', array('class' => 'form-horizontal')) }}
        <fieldset>
        
        <legend>{{ $title }}</legend>
        <div class="control-group"></div>
        
        <!-- Fields-->
        @foreach ($fields as $field)
            <?php $type = $field->type; ?>
            @if ($type == 'legend')
                <legend></legend>
            @elseif ($type == 'hidden')
                {{ Form::hidden($field->name, $field->value) }}
            @else
                <div class="control-group" id="{{ $field->name }}">
                {{ Form::label($field->name, __($labels.'.'.$field->name), array('class'=>'control-label')) }}
                    <div class="controls">
                    @if ($type == 'select')
                        {{ Form::$type($field->name, $field->source, Input::old($field->name)) }}
                    @else
                        {{ Form::$type($field->name, Input::old($field->name)) }}
                    @endif
                    </div>
                </div>
                <!--  Validation errors-->
                @if ($errors->has($field->name))
                    <script type="text/javascript">
                        error_div_ids[error_div_ids.length] = {{'"'."$field->name".'"'}};
                    </script>
                    {{ $errors->first($field->name, '<span class="help-inline">:message</span>') }}
                @endif
            @endif
            
        @endforeach
        
        <!-- Buttons-->
        <div class="control-group">
            <div class="controls">
                {{ Form::submit(__($labels.'.btn-submit'), array('class' => 'btn btn-primary')) }}
                {{ HTML::link('/', __($labels.'.btn-cancel'), array('class' => 'btn')) }}
            </div>
        </div>
        
        </fieldset>
    {{ Form::close() }}    
@endsection