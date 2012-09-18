@layout('layout.form')

@section('content')
    
    <script type="text/javascript">
        var error_div_ids = [];
    </script>
    
    {{ Form::open('offers/new_post', 'post', array('class' => 'form-horizontal')) }}
        
        <fieldset>
        
        <!-- CSRF -->
        {{ Form::token() }}
        
        {{ Form::hidden('offer_type', $offer_type) }}
        @if (! Auth::guest())
            {{ Form::hidden('user_id', Auth::user()->id) }}
        @endif    
        
        <legend>{{ $legend }}</legend>
        
        @foreach ($fields as $field => $opts)
            @if (! is_array($opts))
                <?php $field = $opts; $opts = array(); ?>
            @endif
            
            @if ($field === '-')
                <legend></legend>        
            @else
                <div class="control-group" id="{{ $field }}">
                {{ Form::label($field, __('offers-new.'.$field), array('class'=>'control-label')) }}
                    <div class="controls">
                    
<!--                    Field type: text, select etc.-->
                    @if (key_exists('data-select', $opts))
                        {{ Form::select($field, $opts['data-source'], Input::old($field)) }} 
<!--                        <select>
                        @foreach (array_values($opts['data-source']) as $sel_option)
                            <option>{{ $sel_option }}</option>
                        @endforeach
                        </select>-->
                    @else
                        {{ Form::text($field, Input::old($field), $opts) }}
                    @endif
                    
<!--                    Validation errors-->
                    @if ($errors->has($field))
                        <script type="text/javascript">
                            error_div_ids[error_div_ids.length] = {{'"'."$field".'"'}};
                        </script>
                        {{ $errors->first($field, '<span class="help-inline">:message</span>') }}
                    @endif
                    </div>
                </div>
            @endif
        @endforeach
        
        <div class="control-group">
            <div class="controls">
                {{ Form::submit(__('offers-new.btn-submit'), array('class' => 'btn btn-primary')) }}
                {{ HTML::link('/', __('offers-new.btn-cancel'), array('class' => 'btn')) }}
            </div>
        </div>

        </fieldset>
        
    {{ Form::close() }}
    
    <script type="text/javascript">
        // mark error fields
        for (var i = 0, item; item = error_div_ids[i++];) {
            document.getElementById(item).setAttribute("class", "control-group error");
        }
        
    </script>

@endsection