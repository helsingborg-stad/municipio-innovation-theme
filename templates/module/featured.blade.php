@php
    // Sketchy implementation of extra view controller
    $viewDataFromController = get_defined_vars()['__data'];
    extract(\InnovationsPortalen\Modularity\SectionFeatured::data($viewDataFromController));
@endphp


<section id="{{ $sectionID }}" class="section section-featured {{ $classes }}" style="background-color: {{ $backgroundColor }}; background-image: url({{ $backgroundImage }});">
  @if(isset($effectOverlayColor) && $effectOverlayColor)
    <div class="overlay" style="background-color: {{$effectOverlayColor}};"></div>
  @endif

  <div class="container" {{ $animation['classes'] }}" data-animation="{!! $animation['attribute'] !!}">
     <div class="grid">
        <div class="section-image {{$columnSizes['image']}}">
          @if(is_numeric($foregroundImage))
                <img style="border-color: {{ $foregroundImageFrameColor }}" src="{!! wp_get_attachment_image_src($foregroundImage, array(1200, null))[0] !!}"/>
                @if (! empty($foregroundImageCaption))
                    <div class="section-image-caption">
                        <p>{!! $foregroundImageCaption !!}</p>
                    </div>
                @endif
            @endif
        </div>
        <div class="section-content {{$columnSizes['content']}}">
            <article class="section-article">
              @if (!$hideTitle && !empty($post_title))
              <h2 class="section-title">{!! apply_filters('the_title', $post_title) !!}</h2>
              @endif
              <div class="section-text">
                {!! $content !!}
              </div>
            </article>
        </div>
     </div>
    @if(is_array($submodules) && !empty($submodules))
      <div class="grid section-submodules">
        <div class="grid-xs-12">
        {!! $submoduleRendered !!}
        </div>
      </div>
    @endif
  </div>
  <div class="section-divider"></div>
</section>

