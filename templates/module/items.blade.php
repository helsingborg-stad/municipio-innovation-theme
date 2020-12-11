@include('partials.post-filters')

@php
    // Remove current post if exists
    if (count($posts) > 0 && is_single() 
    || count($posts) > 0 && is_singular(get_post_type())) {
        $posts = array_filter($posts, function($post) {
            return $post->ID !== get_queried_object_id();
        });
    }
@endphp


<div class="grid" data-equal-container>
    @if (!$hideTitle && !empty($post_title))
        <div class="grid-xs-12">
            <div class="u-w-100">
                <div class="grid u-align-items-center">
                    <div class="grid-xs-auto">
                        <h2>{!! apply_filters('the_title', $post_title) !!}</h2>
                    </div>
                    @if ($posts_data_source !== 'input' && isset($archive_link) && $archive_link && $archive_link_url)
                    <div class="u-ml-auto grid-xs-fit-content">
                        <a class="read-more u-ml-auto" href="{{ $archive_link_url }}?{{ http_build_query($filters) }}"><?php _e('Show more', 'modularity'); ?></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if (count($posts) > 0)

    @foreach ($posts as $post)
        <div class="{{ $posts_columns }}">
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
        
                        {{ the_excerpt() }}
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    @else

    <div class="grid-md-12">
        <?php _e('No posts to show…', 'modularity'); ?>
    </div>

    @endif
</div>
