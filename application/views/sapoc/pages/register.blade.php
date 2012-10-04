@layout('layout.form')

@section('content')
    {{ Form::open('register', 'POST') }}
        
        
        <!-- CSRF -->
        {{ Form::token() }}
        
        {{ Form::hidden('active', 1) }}
        {{ Form::hidden('code', Input::get('code')) }}
        {{ Form::hidden('email', Input::get('email')) }}
        
        <!-- Fields -->
        <div class="span5">
            <div class="control-group" id="email">
                {{ Form::label('email', __('form-login.email')) }}
                <div class="controls">
                    <span class="input-large uneditable-input">{{ Input::get('email') }}</span>
                </div>
            </div>
            
            {{ Form::label('password', __('form-login.password')) }}
            {{ $errors->first('password', '<span class="label label-important">:message</span></p>') }}
            {{ Form::password('password') }}
            
            {{ Form::label('company', __('form-register.company')) }}
            {{ $errors->first('company', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('company', Input::old('company')) }}

            {{ Form::label('phone_1', __('form-register.phone_1')) }}
            {{ $errors->first('phone_1', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('phone_1', Input::old('phone_1')) }}
            
            {{ Form::label('contact_person', __('form-register.contact_person')) }}
            {{ Form::text('contact_person', Input::old('contact_person')) }}

            {{-- 
            {{ Form::label('company_id', __('form-register.company_id')) }}
            {{ $errors->first('company_id', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('company_id') }}
            --}}
        </div>

        <div class="span5">
            {{ Form::label('country_id', __('form-register.country_id')) }}
            {{ $errors->first('country_id', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('country_id', Input::old('country_id'), array('class'=>'live-country')) }}
            
            {{ Form::label('district_id', __('form-register.district_id')) }}
            {{ $errors->first('district_id', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('district_id', Input::old('district_id'), array('class'=>'live-district')) }}

            {{ Form::label('city', __('form-register.city')) }}
            {{ $errors->first('city', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('city', Input::old('city'), array('class'=>'live-town')) }}
            
            {{ Form::label('address', __('form-register.address')) }}
            {{ $errors->first('address', '<span class="label label-important">:message</span></p>') }}
            {{ Form::text('address', Input::old('address')) }}
        </div>
        
        <!-- submit button -->
        <hr class="span10">
        <div class="span10 control-group pagination-centered">
            <div class="controls">
            {{ Form::submit(__('form-register.btn-register'), array('class' => 'btn btn-primary')) }}
            </div>
        </div>
    {{ Form::close() }}
    
@endsection
