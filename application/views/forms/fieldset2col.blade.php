@layout('layout.form')

@section('content')
    {{ Form::open($action, 'post', array('class' => 'form-horizontal')) }}
        <fieldset>
        
        <legend>{{ $title }}</legend>
<!--         <div class="control-group"></div>
 -->        
        <legend></legend>
        <!-- Fields-->
        @foreach ($fieldsets as $fields)
            <div class="span5">
            <?php echo render('forms.fieldlist', array('fields' => $fields->get(), 'labels' => $labels)); ?>
            </div>
        @endforeach
        
        <legend></legend>
        <!-- Buttons-->
        <div class="control-group offset2">
            <div class="controls">
                {{ Form::submit(__($labels.'.btn-submit'), array('class' => 'btn btn-primary')) }}
                {{ HTML::link('/', __($labels.'.btn-cancel'), array('class' => 'btn')) }}
            </div>
        </div>
        
        </fieldset>
    {{ Form::close() }}    
@endsection