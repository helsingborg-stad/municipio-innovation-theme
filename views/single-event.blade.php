@extends('templates.master')

@section('content')
    @section('content-header')
        @include('partials.event-header')
    @show
    <div class="container main-container u-pb-8">
        @include('partials.breadcrumbs')

        <div class="grid {{ implode(' ', apply_filters('Municipio/Page/MainGrid/Classes', wp_get_post_parent_id(get_the_id()) != 0 ? array('u-justify-content-center') : array('u-justify-content-center'))) }}">
            @include('partials.sidebar-left')

            <div class="grid-xs-12 grid-md-8  grid-print-12" id="readspeaker-read">

                @if (is_active_sidebar('content-area-top'))
                    <div class="grid grid--columns sidebar-content-area sidebar-content-area-top">
                        <?php dynamic_sidebar('content-area-top'); ?>
                    </div>
                @endif

                @while(have_posts())
                    {!! the_post() !!}
                    @yield('before-article')
                    @include('partials.article', array('articlTitleHidden' => true, 'articlTitleHidden' => true))
                    @yield('after-article')
                @endwhile

                @if (is_active_sidebar('content-area'))
                    <div class="grid grid--columns sidebar-content-area sidebar-content-area-bottom">
                        <?php dynamic_sidebar('content-area'); ?>
                    </div>
                @endif

            </div>

            <aside class="box box-filled box-filled-1 grid-xs-12 grid-md-4">
                <div class="box-content">
                    @if (!empty($event['occasion']['formatted']))
                      <div class="u-py-1">
                        <h4 class="u-pb-1">Tidpunkt</h4>
                        <p>{{ $event['occasion']['formatted'] }}</p>
                      </div>
                    @endif

                    @if (!empty($event['location']['formatted_address']))
                      <div class="u-py-1">
                        <h4 class="u-pb-1">Plats</h4>
                        <p>{{ $event['location']['formatted_address'] ?? '' }}</p>
                      </div>
                    @endif

                    @if (!empty($organizers = get_field('organizers')))
                      <div class="u-py-1">
                        <h4 class="u-pb-1">Kontakt</h4>
                        @foreach ($organizers as $organizer)
                          @if (!empty($organizer['organizer']))
                            <p>{{ $organizer['organizer'] }}</p>
                          @endif
                          @if (!empty($organizer['organizer_phone']))
                            <div>
                              <span>Telefon: </span>
                              <a href="tel:{{ $organizer['organizer_phone'] }}">
                                {{ $organizer['organizer_phone'] }}
                              </a>
                            </div>
                          @endif
                          @if (!empty($organizer['organizer_email']))
                            <div>
                              <span>E-post: </span>
                              <a href="mailto:{{ $organizer['organizer_email'] }}">
                                {{ $organizer['organizer_email'] }}
                              </a>
                            </div>
                          @endif
                        @endforeach
                      </div>
                    @endif

                    @if (!empty($event['booking_link']))
                      <div class="u-pt-3 text-center">
                          <a class="btn btn-primary btn-sm" href="{{$event['booking_link']}}">
                            Boka plats
                          </a>
                      </div>
                    @endif

                </div>
            </aside>


            @include('partials.sidebar-right')
        </div>

        <?php do_action('customer-feedback'); ?>
    </div>

    @section('content-bottom')
        @include('partials.event-bottom')
    @show
@stop
