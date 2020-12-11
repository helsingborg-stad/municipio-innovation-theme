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
            @includeFirst(['item.post-' . $post->post_type, 'item.post'], ['post' => $post])
        </div>
    @endforeach
    @else

    <div class="grid-md-12">
        <?php _e('No posts to show…', 'modularity'); ?>
    </div>

    @endif
</div>
