@layout('sapoc.layout.main')

@section('content')
    <script type="text/javascript">
        var error_div_ids = [];
    </script>
    {{ Form::open('offers/new', 'post', array('class' => 'form-horizontal')) }}
        
        <!-- CSRF -->
        {{ Form::token() }}
        
        {{ Form::hidden('offer_type', $offer_type) }}
        @if (!Auth::guest())
            {{ Form::hidden('user_id', Auth::user()->id) }}
        @endif    
        
<!--        <legend>{{ __('offers-new.legend') }}</legend>-->
        <legend>{{ $legend }}</legend>
        
        @foreach ($fields as $field)
            @if ($field === '-')
                <legend></legend>        
            @else
                <div class="control-group" id="{{ $field }}">
                {{ Form::label($field, __('offers-new.'.$field), array('class'=>'control-label')) }}
                    <div class="controls">
                    {{ Form::text($field, Input::old($field)) }}
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

    {{ Form::close() }}
    
    <script type="text/javascript">
        // mark error fields
        for (var i = 0, item; item = error_div_ids[i++];) {
            document.getElementById(item).setAttribute("class", "control-group error");
        }
    </script>

@endsection