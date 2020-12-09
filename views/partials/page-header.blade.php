<header class="page-header">
    <div class="container page-header__container">
        <div class="grid u-flex-row-reverse@sm u-flex-row-reverse@md u-flex-row-reverse@lg u-flex-row-reverse@xl">
            <div class="grid-xs-12 grid-sm-6 order-2 page-header__image">
                <img src="{{municipio_get_thumbnail_source($post->ID, array(342,256), '4:3')}}">
            </div>
            <div class="grid-xs-12 grid-sm-6 page-header__body">
                <div class="page-header__content">
                    <span class="page-header__meta">{{get_post_type()}}</span>
                    <h1 class="page-header__title">{{the_title()}}</h1>
                    {{the_excerpt()}}
                </div>
            </div>
        </div>
    </div>
</header>