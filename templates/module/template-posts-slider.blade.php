@extends('template-posts')

@section('archive-link')
    <div class="u-ml-auto grid-xs-fit-content u-align-self-end">
        <div class="grid">
            @yield('before-archive-link')
            
            <div class="grid-xs-12 u-flex u-justify-content-end">
                @if ($posts_data_source !== 'input' && isset($archive_link) && $archive_link && $archive_link_url)
                    <a class="u-mr-3 related-posts__archive_link weight-400 u-align-self-center" href="{{ $archive_link_url }}?{{ http_build_query($filters) }}">{{$archiveLinkText}}</a>
                @endif

                <button class="btn btn-sm btn-outline btn-floating btn-floating--flat js-post-slider__prev u-mr-1">
                    <i class="pricon pricon-angle-left"></i>
                </button>
                <button class="btn btn-sm btn-outline btn-floating btn-floating--flat js-post-slider__next">
                    <i class="pricon pricon-angle-right"></i>
                </button>
            </div>

            @yield('after-archive-link')
        </div>
    </div>
@stop

@section('loop')
    <div id="flickity-mod-posts-{{$ID}}" class="grid u-w-100 post-slider__flickity js-post-slider__flickity" data-flickity-options='{!! $slider['flickityOptions'] !!}'  data-equal-container>
        @foreach ($posts as $post)
            <div class="post-slider__item @if (isset($columnsPerRow) && $loop->iteration > $columnsPerRow) u-flickity-init-hidden @endif {{ $posts_columns }}">
                @includeFirst(['item.post-' . $post->post_type, 'item.post'], ['post' => $post])
            </div>
        @endforeach
    </div>
@stop
