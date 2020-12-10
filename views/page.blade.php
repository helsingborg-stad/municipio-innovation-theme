@extends('templates.master')

@section('content')

@include('partials.page-header');

<div class="container main-container u-pb-5">

    @include('partials.breadcrumbs')

    <div class="grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('u-justify-content-center') : array('u-justify-content-center'))) }}">
        @include('partials.sidebar-left')

        <div class="grid-xs-12 grid-md-7 grid-print-12" id="readspeaker-read">

            @if (is_active_sidebar('content-area-top'))
                <div class="grid grid--columns sidebar-content-area sidebar-content-area-top">
                    <?php dynamic_sidebar('content-area-top'); ?>
                </div>
            @endif

            @while(have_posts())
                {!! the_post() !!}

                @include('partials.article', array('articlTitleHidden' => true, 'articlTitleHidden' => true))
            @endwhile

            @if (is_active_sidebar('content-area'))
                <div class="grid grid--columns sidebar-content-area sidebar-content-area-bottom">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            @endif

            @if (is_singular() && comments_open() && get_option('comment_registration') == 0 || is_singular() && comments_open() && is_user_logged_in())
                @if(get_option('comment_order') == 'desc')
                    <div class="grid">
                        <div class="grid-sm-12">
                            @include('partials.blog.comments-form')
                        </div>
                    </div>
                    @if(isset($comments) && ! empty($comments))
                        <div class="grid">
                            <div class="grid-sm-12">
                                @include('partials.blog.comments')
                            </div>
                        </div>
                    @endif
                @else
                    @if(isset($comments) && ! empty($comments))
                        <div class="grid">
                            <div class="grid-sm-12">
                                @include('partials.blog.comments')
                            </div>
                        </div>
                    @endif
                    <div class="grid">
                        <div class="grid-sm-12">
                            @include('partials.blog.comments-form')
                        </div>
                    </div>
                @endif
            @endif
        </div>

        @include('partials.sidebar-right')
    </div>

    <?php do_action('customer-feedback'); ?>
</div>

@stop
