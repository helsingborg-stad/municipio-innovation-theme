<a href="{{ the_permalink($post->ID) }}" class="box box-card-post">
    <div class="box__container" data-equal-item>
        @if (municipio_get_thumbnail_source($post->ID,array(400,225)))
        <img class="box__image u-w-100" src="{{ municipio_get_thumbnail_source($post->ID,array(400,225), '3:2') }}">
        @else
            @if (in_array('category', (array)get_field('archive_' . sanitize_title(get_post_type($post->ID)) . '_post_display_info', 'option')) && isset(get_the_category()[0]->name))
            <span class="label-category label label-theme">{{ get_the_category()[0]->name }}</span>
            @endif
        @endif

        <div class="box__content">
            <h3 class="box__title">{{ get_the_title($post->ID) }}</h3>

            @if (get_field('archive_' . sanitize_title(get_post_type($post->ID)) . '_feed_date_published', 'option') != 'false')
            <time>
                {{ in_array(get_field('archive_' . sanitize_title(get_post_type($post->ID)) . '_feed_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
                {{ in_array(get_field('archive_' . sanitize_title(get_post_type($post->ID)) . '_feed_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
            </time>
            @endif

            @if (get_the_excerpt($post->ID))
                <p>{{ get_the_excerpt($post->ID)}}</p>
            @endif
        </div>
    </div>
</a>