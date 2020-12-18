<div class="grid related-posts {{$classes ?? ''}}" data-equal-container>
    @if (!$hideTitle && !empty($post_title))
        <div class="grid-xs-12 u-mb-3">
            <div class="u-w-100">
                <div class="grid u-align-items-center">
                    <div class="grid-xs-10 grid-md-auto u-mb-2 u-mb-0@md u-mb-0@lg u-mb-0@xl">
                        @yield('before-title')
                        <h2>{!! apply_filters('the_title', $post_title) !!}</h2>
                        @section('after-title')
                            @if (!empty($headingContent))
                                <p class="u-mt-1">{{$headingContent}}</p>
                            @endif
                        @show
                    </div>
                    @section('archive-link')
                        @if ($posts_data_source !== 'input' && isset($archive_link) && $archive_link && $archive_link_url)
                            <div class="u-ml-auto u-mb-2 u-mb-0@md u-mb-0@lg u-mb-0@xl grid-xs-12 grid-md-fit-content u-align-self-end">
                                <div class="grid">
                                    @yield('before-archive-link')
                                    <div class="grid-xs-12 u-text-right">
                                        <a class="u-ml-auto related-posts__archive_link" href="{{ $archive_link_url }}?{{ http_build_query($filters) }}">{{$archiveLinkText}} <i class="pricon pricon-right-fat-arrow u-ml-1"></i></a>
                                    </div>
                                    @yield('after-archive-link')
                                </div>
                            </div>
                        @endif
                    @show
                </div>
            </div>
        </div>
    @endif

    @if (count($posts) > 0)
        <div class="grid-xs-12 u-mb-0">
            @section('loop')
                <div class="grid grid--columns u-w-100">
                    @foreach ($posts as $post)
                        <div class="{{ $posts_columns }}">
                            @includeFirst(['item.post-' . $post->post_type, 'item.post'], ['post' => $post])
                        </div>
                    @endforeach
                </div>
            @show
        </div>
    @else

    <div class="grid-md-12 u-mb-0">
        <?php _e('No posts to show…', 'modularity'); ?>
    </div>

    @endif
</div>
