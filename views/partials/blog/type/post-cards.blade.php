<?php global $post; ?>
<div class="{{ $grid_size }}">
    <a href="{{ the_permalink() }}" class="box box-card-post">
        <div class="box__container" data-equal-item>
            @if (municipio_get_thumbnail_source(null,array(504,336)))
            <img class="box__image u-w-100" src="{{ municipio_get_thumbnail_source(null,array(504,336), '3:2') }}">
            @else
                @if (in_array('category', (array)get_field('archive_' . sanitize_title(get_post_type()) . '_post_display_info', 'option')) && isset(get_the_category()[0]->name))
                <span class="label-category label label-theme">{{ get_the_category()[0]->name }}</span>
                @endif
            @endif

            <div class="box__content">
                <h3 class="box__title">{{ the_title() }}</h3>

                @if (get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option') != 'false')
                <time>
                    {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'date')) ? the_time(get_option('date_format')) : '' }}
                    {{ in_array(get_field('archive_' . sanitize_title(get_post_type()) . '_feed_date_published', 'option'), array('datetime', 'time')) ? the_time(get_option('time_format')) : '' }}
                </time>
                @endif

                @if (!has_excerpt($post->ID) && get_field('page_header_content', $post->ID))
                    <p>{{get_field('page_header_content', $post->ID)}}</p>
                @else
                    <p>{{ get_the_excerpt($post->ID)}}</p>
                @endif
            </div>
        </div>
    </a>
</div>
