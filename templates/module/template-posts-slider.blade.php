@extends('template-posts')

@section('after-archive-link')
    <div class="grid-xs-12 u-text-right">
        <div class="js-flickity-controller" data-flickity-controller-target="#flickity-mod-posts-{{$ID}}">
            <button class="js-post-slider__prev"> <i class="pricon pricon-angle-left"></i></button>
            <button class="js-post-slider__next"> <i class="pricon pricon-angle-right"></i></button>
        </div>
    </div>
@stop

@section('loop')
    <div id="flickity-mod-posts-{{$ID}}" class="grid u-w-100 js-post-slider__flickity" data-flickity-options='{!! $slider['flickityOptions'] !!}'  data-equal-container>
        @foreach ($posts as $post)
            <div class="flickity-item js-flickity-item {{ $posts_columns }}">
                @includeFirst(['item.post-' . $post->post_type, 'item.post'], ['post' => $post])
            </div>
        @endforeach
    </div>
@stop
