@layout('layout.form')

@section('content')
    {{ Form::open('/', 'post', array('class' => 'form-horizontal')) }}
        <fieldset>
        
        <legend>{{ $title }}</legend>
        <div class="control-group"></div>
        
        <!-- Fields-->
        <legend>fields1col</legend>
        @yield('fields1col')
        <legend>fields2col</legend>
        @yield('fields2col')
        
        <legend></legend>
        <!-- Buttons-->
        <div class="control-group">
            <div class="controls">
                {{ Form::submit(__($labels.'.btn-submit'), array('class' => 'btn btn-primary')) }}
                {{ HTML::link('/', __($labels.'.btn-cancel'), array('class' => 'btn')) }}
            </div>
        </div>
        
        </fieldset>
    {{ Form::close() }}    
@endsection