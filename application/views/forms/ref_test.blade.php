@layout('layout.form')

@section('content')
    {{ Form::open('ref/test', 'post', array('class' => 'form-horizontal')) }}
        <fieldset>
   	        <legend>Test</legend>

            <!-- Auth if not authed-->
            @if (Auth::guest())
                @if ($login_errors)
                <div id="auth" class="modal show">
                @else
                <div id="auth" class="modal hide fade in">
                @endif
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h4 id="auth-lable">Please authorize to save changes</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::hidden('need_auth', true) }}
                        <div class="control-group" id="group01">
                            {{ Form::label('email', 'Email', array('class'=>'control-label')) }}
                            <div class="controls">
                                {{ Form::text('email') }}
                            </div>
                        </div>
                        <div class="control-group" id="group02">
                            {{ Form::label('password', 'Password', array('class'=>'control-label')) }}
                            <div class="controls">
                                {{ Form::password('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                        {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                    </div>
                </div>
            @endif

            <!-- Main fields -->
   	        <div class="control-group" id="group1">
   	        	{{ Form::label('country', 'Country', array('class'=>'control-label')) }}
   	        	<div class="controls">
   	        		{{ Form::text('country', Input::old('country'), array('class' => 'live-country')) }}
   	        	</div>
   	        </div>
            <div class="control-group" id="group2">
              {{ Form::label('district', 'District', array('class'=>'control-label')) }}
              <div class="controls">
                {{ Form::text('district', Input::old('district'), array('class' => 'live-district')) }}
              </div>
            </div>
            <div class="control-group" id="group3">
              {{ Form::label('town', 'Town', array('class'=>'control-label')) }}
              <div class="controls">
                {{ Form::text('town', Input::old('district'), array('class' => 'live-town')) }}
              </div>
            </div>

            <!-- Buttons -->
            <div class="control-group">
                <div class="controls">
                      @if (Auth::guest())
                          {{ HTML::link('#auth', 'Save changes', array('class'=>'btn btn-primary', 'data-toggle'=>"modal")) }}
                      @else
                          {{ Form::submit('Save changes', array('class' => 'btn btn-primary')) }}
                      @endif
                      {{ HTML::link('/', 'Cancel', array('class' => 'btn')) }}
                </div>
            </div>

        </fieldset>
    {{ Form::close() }}
@endsection   