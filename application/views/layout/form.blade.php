@layout('layout.main')

@section('grid')
    <div class="span2">
        <div class="well sidebar-nav">
        <ul class="nav nav-list">
            @section('menu')
            <li class="nav-header">{{ __('form-main.freight_title') }}</li>
            <!-- li class="active"><a href="#">Link</a></li-->
            <li>{{  HTML::link_to_action('offers@new_freight', __('form-main.freight_add')) }}</li>
            <li>{{  HTML::link('search/freight', __('form-main.freight_search')) }}</li>
            <li class="nav-header">{{ __('form-main.trans_title') }}</li>
            <li>{{  HTML::link_to_action('offers@new_trans', __('form-main.trans_add')) }}</li>
            <li>{{  HTML::link('search/trans', __('form-main.trans_search')) }}</li>
            @if (!Auth::guest())
                <li class="nav-header">User</li>
                <li>{{  HTML::link('user/profile', __('form-main.profile')) }}</a></li>
                <li>{{  HTML::link('user/bids', __('form-main.bids')) }}</li>
            @endif
            @yield_section
            
        </ul>
        </div><!--/.well -->
    </div><!--/span2-->
    
    <!-- Errors init-->
    <script type="text/javascript">
        var error_div_ids = [];
    </script>
    <!--/span10 -->
    <div class="span10">
        @yield('content')
    </div><!--/span10-->
@endsection