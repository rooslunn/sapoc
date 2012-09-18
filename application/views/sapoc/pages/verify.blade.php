@layout('layout.form')

@section('content')
    {{ Form::open('verify') }}
        
        <!-- CSRF -->
        {{ Form::token() }}

        <!-- username field -->
        {{ Form::label('email', __('form-verify.email')) }}
        {{ $errors->first('email', '<span class="label label-important">:message</span></p>') }}
        {{ Form::email('email') }}
        
        <!-- submit button -->
        <p></p>
        {{ Form::submit(__('form-verify.btn-verify'), array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    
@endsection
