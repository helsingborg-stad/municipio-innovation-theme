<div class="grid related-posts {{$classes ?? ''}}" data-equal-container>
    @if (!$hideTitle && !empty($post_title))
        <div class="grid-xs-12">
            <div class="u-w-100">
                <div class="grid u-align-items-center">
                    <div class="grid-xs-auto">
                        @yield('before-title')
                        <h2>{!! apply_filters('the_title', $post_title) !!}</h2>
                        @section('after-title')
                            @if (!empty($headingContent))
                                <p>{{$headingContent}}</p>
                            @endif
                        @show
                    </div>
                    @section('archive-link')
                        @if ($posts_data_source !== 'input' && isset($archive_link) && $archive_link && $archive_link_url)
                            <div class="u-ml-auto grid-xs-fit-content">
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
        <div class="grid-xs-12">
            @section('loop')
                <div class="grid grid--columns">
                    @foreach ($posts as $post)
                        @section('item')
                            <div class="{{ $posts_columns }}">
                                @includeFirst(['item.post-' . $post->post_type, 'item.post'], ['post' => $post])
                            </div>
                        @show
                    @endforeach
                </div>
            @show
        </div>
    @else

    <div class="grid-md-12">
        <?php _e('No posts to show…', 'modularity'); ?>
    </div>

    @endif
</div>
