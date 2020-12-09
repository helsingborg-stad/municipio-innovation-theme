@if($post)
    <section class="featured-post">
        <div class="featured-post__image">
            <img src="{{municipio_get_thumbnail_source($post->ID, array(74.67,56), '4:3')}}">
        </div>
        <div class="featured-post__content">
            <span class="featured-post__meta">{{$post->post_type}}</span>
            <h4 class="featured-post__title h2">
                {{$post->post_title}}
            </h4>
        </div>
        <div class="featured-post__action">
            <a class="btn btn-light" href="{{get_permalink($post->ID)}}">{{$buttonText}}</a>
        </div>
    </section>
@endif