@layout('sapoc.layout.main')

@section('login')
    <li><a href="#">{{ __('index-full.logged-as') . ' ' . $user }}</a></li>
    <li>{{ HTML::link('logout', __('index-full.logout')) }}</li>
@endsection

@section('locked_menu')
    <li class="nav-header">User</li>
    <li><a href="#">Account</a></li>
    <li><a href="#">Bids</a></li>
@endsection
