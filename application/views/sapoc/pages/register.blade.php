@layout('sapoc.layout.main')

@section('content')
    {{ Form::open('register') }}
        
        <!-- check for form errors var -->
        @if (Session::has('register_errors'))
            <div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{ __('form-register.failed') }}
            </div>        
        @endif
        
        <!-- CSRF -->
        {{ Form::token() }}
        
        {{ Form::hidden('active', 0) }}
        
        <!-- Fields -->
        {{ Form::label('email', __('form-register.email')) }}
        {{ $errors->first('email', '<span class="label label-important">:message</span></p>') }}
        {{ Form::email('email') }}
        
        {{ Form::label('password', __('form-register.password')) }}
        {{ $errors->first('password', '<span class="label label-important">:message</span></p>') }}
        {{ Form::password('password') }}
        
        {{ Form::label('company', __('form-register.company')) }}
        {{ Form::text('company') }}
        
        {{ Form::label('company_id', __('form-register.company_id')) }}
        {{ Form::text('company_id') }}
        
        {{ Form::label('country_id', __('form-register.country_id')) }}
        {{ Form::text('country_id') }}
        
        {{ Form::label('district_id', __('form-register.district_id')) }}
        {{ Form::text('district_id') }}
        
        {{ Form::label('city', __('form-register.city')) }}
        {{ Form::text('city') }}
        
        {{ Form::label('address', __('form-register.address')) }}
        {{ Form::text('address') }}
        
        {{ Form::label('phone_1', __('form-register.phone_1')) }}
        {{ Form::text('phone_1') }}
        
        {{ Form::label('contact_person', __('form-register.contact_person')) }}
        {{ Form::text('contact_person') }}
        
<!--
        {{ Form::label('', __('form-register.')) }}
        {{ Form::text('') }}
-->
        
        <!-- submit button -->
        {{ Form::submit(__('form-register.btn-register'), array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    
@endsection
