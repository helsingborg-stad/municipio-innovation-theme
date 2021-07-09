@php

    $occasion = null;
    $location = null;

    if (is_plugin_active('api-event-manager-integration/event-manager-integration.php')) {
      $occasion = \EventManagerIntegration\Helper\SingleEventData::singleEventDate($post->ID);
      $location = \EventManagerIntegration\Helper\SingleEventData::getEventLocation($post->ID);
    }

    $permalink = get_permalink($post->ID);

    if (isset($_GET) && !empty($_GET)) {
        $permalink .= '?' . http_build_query($_GET);
    }

@endphp

<a href="{{ get_permalink($post->ID) }}" class="box box--project box--feature u-radius-8">
    <div class="box__container" data-equal-item>
        <div class="box__image ratio-12-16 u-radius-8" style="background-image:url('{{ municipio_get_thumbnail_source($post->ID,array(636,846), '12:16') }}');">
        </div>
        <div class="box__content">
            @if ($location && !empty($location['title']))
                <div class="box__meta">
                    <b>{{$location['title']}}</b>
                </div>
            @endif
            <h3 class="box__title u-mb-0">{{ $post->post_title }}</h3>
            @if ($occasion && !empty($occasion['formatted']))
                <div class="box__meta">
                    <b>{{$occasion['formatted']}}</b>
                </div>
            @endif
        </div>
    </div>
</a>

