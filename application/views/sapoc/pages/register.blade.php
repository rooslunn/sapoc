@layout('sapoc.layout.main')

@section('content')
    {{ Form::open('register') }}
        
        <!-- check for form errors var -->
        @if (Session::has('register_errors'))
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ __('form-login.failed') }}
            </div>        
        @endif
        
        <!-- CSRF -->
        {{ Form::token() }}
        
        <!-- Fields -->
        {{ Form::label('company', __('form-register.company')) }}
        {{ Form::text('company') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
        
        {{ Form::label('email', __('form-register.email')) }}
        {{ Form::email('email') }}
        
        {{ Form::label('password', __('form-login.password')) }}
        {{ Form::password('password') }}
        
        <!-- submit button -->
        <span class="help-block"><a href="#"><small>{{ __('form-login.forgot') }}</small></a></span>
        {{ Form::submit(__('form-login.btn-login'), array('class' => 'btn btn-primary')) }}
        <span class="help-block"><a href="#">{{ __('form-login.register') }}</a></span>
    {{ Form::close() }}
    
@endsection
