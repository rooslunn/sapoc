@layout('sapoc.layout.main')

@section('content')
    {{ Form::open('login') }}
        
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ __('form-login.failed') }}
            </div>        
        @endif
        
        <!-- username field -->
        {{ Form::label('email', __('form-login.email')) }}
        {{ Form::email('email') }}
        
        <!-- password field -->
        {{ Form::label('password', __('form-login.password')) }}
        {{ Form::password('password') }}
        
        <!-- submit button -->
        <span class="help-block"><a href="#"><small>{{ __('form-login.forgot') }}</small></a></span>
        {{ Form::submit(__('form-login.btn-login'), array('class' => 'btn btn-primary')) }}
        <span class="help-block"><a href="#">{{ __('form-login.register') }}</a></span>
    {{ Form::close() }}
    
@endsection
