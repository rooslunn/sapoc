@layout('layout.form')

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
        
<!--        {{ Form::hidden('active', 1) }}-->
        {{ Form::hidden('code', $code) }}
        {{ Form::hidden('email', $email) }}
        
        <!-- Fields -->
        <div class="control-group" id="email">
            {{ Form::label('email', __('form-login.email')) }}
            <div class="controls">
                <span class="input-large uneditable-input">{{ $email }}</span>
            </div>
        </div>
        
        {{ Form::label('password', __('form-login.password')) }}
        {{ $errors->first('password', '<span class="label label-important">:message</span></p>') }}
        {{ Form::password('password') }}
        
        {{ Form::label('company', __('form-register.company')) }}
        {{ Form::text('company', Input::old('company')) }}

        {{-- 
        {{ Form::label('company_id', __('form-register.company_id')) }}
        {{ Form::text('company_id') }}
        --}}
        
        {{ Form::label('country_id', __('form-register.country_id')) }}
        {{ Form::text('country_id', Input::old('country_id'), array('class'=>'live-country')) }}
        
        {{ Form::label('district_id', __('form-register.district_id')) }}
        {{ Form::text('district_id', Input::old('district_id'), array('class'=>'live-district')) }}
        
        {{ Form::label('city', __('form-register.city')) }}
        {{ Form::text('city', Input::old('city'), array('class'=>'live-town')) }}
        
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
        <div class="control-group">
            <div class="controls">
            {{ Form::submit(__('form-register.btn-register'), array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    
@endsection
