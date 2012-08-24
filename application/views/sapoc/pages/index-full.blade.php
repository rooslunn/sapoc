@layout('sapoc.layout.main')

@section('login')
    <li><a href="#">{{ __('index-full.logged-as') . ' ' . Auth::user()->email }}</a></li>
    <li><a href="#">{{ __('index-full.logout') }}</a></li>
@endsection

@section('locked_menu')
    <li class="nav-header">User</li>
    <li><a href="#">Account</a></li>
    <li><a href="#">Bids</a></li>
@endsection
