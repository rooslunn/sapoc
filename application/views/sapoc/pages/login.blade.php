@layout('layout.form')

@section('content')
    {{ Form::open('login', 'post', array('class' => 'form-horizontal')) }}
        
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ __('form-login.failed') }}
            </div>        
        @endif
        
        <!-- Offer after login -->
        @foreach(Input::old() as $name=>$value)
        {{ Form::hidden($name, $value) }}
        @endforeach

        <!-- CSRF -->
        {{ Form::token() }}

        <legend>{{ __('form-login.legend') }}</legend>
        
        <!-- username field -->
        <div class="control-group">
            {{ Form::label('email', __('form-login.email'), array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::email('email') }}
                <span class="help-inline">
                    {{ HTML::link_to_action('sapoc@verify', __('form-login.register')) }}
                </span>
            </div>
        </div>
        
        <!-- password field -->
        <div class="control-group">
            {{ Form::label('password', __('form-login.password'), array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::password('password') }}
                <span class="help-inline">
                    <a href="#">{{ __('form-login.forgot') }}</a>
                </span>
            </div>
        </div>
        
        <!-- submit button -->
        <div class="control-group">
            <div class="controls">
                {{ Form::submit(__('form-login.btn-login'), array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    
@endsection