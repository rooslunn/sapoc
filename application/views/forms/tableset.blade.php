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
                @if (isset($btns))
                    <td>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                        @foreach ($btns as $action => $icon)
                            <a class="btn" href="{{ $action }}"><i class="{{ $icon }}"></i></a>
                        @endforeach
                        </div>
                    </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection