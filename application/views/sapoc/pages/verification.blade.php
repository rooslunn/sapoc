@layout('layout.form')

@section('content')
    <h4>{{ $message }}</h4>
    {{ HTML::link($link, __('form-verify.linkname')) }}
@endsection