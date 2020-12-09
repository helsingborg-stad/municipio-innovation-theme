<header class="page-header page-header--{{get_post_type()}}">
    <div class="container page-header__container">
        <div class="grid u-flex-row-reverse@sm u-flex-row-reverse@md u-flex-row-reverse@lg u-flex-row-reverse@xl">
            <div class="grid-xs-12 grid-sm-6 order-2 page-header__image u-mb-2@xs">
                <img src="{{municipio_get_thumbnail_source($post->ID, array(456,342), '4:3')}}">
            </div>
            <div class="grid-xs-12 grid-sm-6 page-header__body">
                <div class="page-header__content">
                    <span class="page-header__meta meta u-mb-1">{{get_post_type()}}</span>
                    <h1 class="page-header__title">{{the_title()}}</h1>
                    {{the_excerpt()}}
                </div>
            </div>
        </div>
    </div>
</header>