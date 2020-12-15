@php
    // Sketchy implementation of extra view controller
    $viewDataFromController = get_defined_vars()['__data'];
    extract(\InnovationsPortalen\Modularity\Posts::data($viewDataFromController));
@endphp

<div class="grid related-posts" data-equal-container>
    @if (!$hideTitle && !empty($post_title))
        <div class="grid-xs-12">
            <div class="u-w-100">
                <div class="grid u-align-items-center">
                    <div class="grid-xs-auto">
                        <h2>{!! apply_filters('the_title', $post_title) !!}</h2>
                    </div>
                    @if ($posts_data_source !== 'input' && isset($archive_link) && $archive_link && $archive_link_url)
                    <div class="u-ml-auto grid-xs-fit-content">
                        <a class="u-ml-auto related-posts__archive_link" href="{{ $archive_link_url }}?{{ http_build_query($filters) }}"><?php _e('Show all', 'municipio-innovation-theme'); ?> <i class="pricon pricon-right-fat-arrow u-ml-1"></i></a>
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
