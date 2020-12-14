<header class="page-header page-header--{{get_post_type()}}">
    <div class="container page-header__container">
        <div class="grid u-flex-row-reverse@sm u-flex-row-reverse@md u-flex-row-reverse@lg u-flex-row-reverse@xl">
            <div class="grid-xs-12 grid-sm-6 order-2 page-header__image u-mb-2@xs">
                @if (municipio_get_thumbnail_source($post->ID, array(456,342), '4:3'))
                    <img class="u-max-width-header-image" src="{{municipio_get_thumbnail_source($post->ID, array(456,342), '4:3')}}">
                @endif
            </div>
            <div class="grid-xs-12 grid-sm-6 page-header__body">
                <div class="page-header__content u-max-width-header-content u-ml-auto">
                    @if (get_field('page_header_meta', $post->ID))
                        <span class="page-header__meta meta u-mb-1">{{get_field('page_header_meta', $post->ID)}}</span>
                    @endif
                    <h1 class="page-header__title">{{get_the_title()}}</h1>

                    @if (get_field('page_header_content', $post->ID))
                        <p>{{get_field('page_header_content', $post->ID)}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>