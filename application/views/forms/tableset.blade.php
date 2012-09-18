@layout('layout.form')

@section('content')
    <legend>{{ $title }}</legend>
    <table class="table table-hover">
<!--        <caption>{{ $title }}</caption>-->
    <thead>
        <tr>
        @foreach ($heads as $head)
            <th>{{ __($labels.'.'.$head) }}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach($heads as $field_name)
                    <td>{{ $row->$field_name }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection