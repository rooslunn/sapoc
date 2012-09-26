@layout('layout.form')

@section('content')
    {{ Form::open('/', 'post', array('class' => 'form-horizontal')) }}
        <fieldset>
   	        <legend>Test</legend>
   	        <div class="control-group" id="group1">
   	        	{{ Form::label('country', 'Country', array('class'=>'control-label')) }}
   	        	<div class="controls">
   	        		{{ Form::text('country', '', array('class' => 'live-country')) }}
   	        	</div>
   	        </div>
            <div class="control-group" id="group2">
              {{ Form::label('district', 'District', array('class'=>'control-label')) }}
              <div class="controls">
                {{ Form::text('district', '', array('class' => 'live-district')) }}
              </div>
            </div>
        </fieldset>
    {{ Form::close() }}
@endsection   