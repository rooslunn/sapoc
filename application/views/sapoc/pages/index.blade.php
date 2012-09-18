@layout('layout.main')

@section('grid')
    <ul class="thumbnails">
        <li class="span6">
            <div class="thumbnail pagination-centered">
                <img src="img/container.jpeg" alt="">
                <i class="icon-plus"></i>
                {{  HTML::link_to_action('offers@new_freight', __('form-main.freight_add_start')) }}
                <span class="offset1"></span>
                <i class="icon-search"></i>
                {{  HTML::link('search/freight', __('form-main.freight_search_start')) }}
            </div>
        </li>
        <li class="span6">
            <div class="thumbnail pagination-centered">
                <img src="img/truck2.jpg" alt="">
                <i class="icon-plus"></i>
                {{  HTML::link_to_action('offers@new_trans', __('form-main.trans_add_start')) }}
                <span class="offset1"></span>
                <i class="icon-search"></i>
                {{  HTML::link('search/trans', __('form-main.trans_search_start')) }}
            </div>
        </li>
    </ul>
    
<!--    <div class="hero-unit">
        <img src="img/Truk.jpg" class="img-rounded"></img>

        <h2>Whatrulookingat?</h2>
        <p>Bla-bla-blah</p>
        <p><a class="btn btn-primary btn-large" href="http://www.artlebedev.ru/kovodstvo/sections/165/">More &raquo;</a></p>

    </div>-->
@endsection
    