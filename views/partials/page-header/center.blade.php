
<header class="page-header page-header--{{get_post_type()}} @if(municipio_get_thumbnail_source($post->ID, array(1080,608), '16:9')) u-pb-0  u-mb-7 @endif">
    <div class="container page-header__container">
        <div class="grid u-flex-row-reverse@sm">
            <div class="grid-xs-12 grid-md-10 offset-md-1 page-header__body">
                <div class="page-header__content u-text-center">
                    @if (get_field('page_header_meta', $post->ID))
                        <span class="page-header__meta meta u-mb-1">{{get_field('page_header_meta', $post->ID)}}</span>
                    @endif
                    <h1 class="page-header__title">{{the_title()}}</h1>
                    @if (get_field('page_header_content', $post->ID))
                        <p>{{get_field('page_header_content', $post->ID)}}</p>
                    @endif
                </div>
            </div>
            
            @if (municipio_get_thumbnail_source($post->ID, array(1080,608), '16:9'))
                <div class="grid-xs-12 grid-md-10 offset-md-1 page-header__image u-mt-4 u-offset-page-header-img">
                    <img src="{{municipio_get_thumbnail_source($post->ID, array(1080,608), '16:9')}}">
                </div>
            @endif
        </div>
    </div>
</header>