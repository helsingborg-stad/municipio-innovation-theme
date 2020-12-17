@php

    $archiveUrl = get_post_type_archive_link('project');

    if (is_singular('project') && isset($_GET) && !empty($_GET)) {
        $archiveUrl .= '?' . http_build_query($_GET);
    }

@endphp

<div class="search-top {!! apply_filters('Municipio/desktop_menu_breakpoint', 'hidden-sm'); !!} hidden-print" id="search">
    <div class="container">
        <div class="grid">
            <div class="grid-sm-12">
                {{ get_search_form() }}
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-mainmenu hidden-print {{ apply_filters('Municipio/header_transparent', false) ? 'navbar-transparent' : '' }} {{ get_field('header_sticky', 'option') ? apply_filters( 'Municipio/StickyScroll', 'sticky-scroll' ) : '' }}">
    <div class="container">
        <div class="grid">
            <div class="grid-xs-12 {!! apply_filters('Municipio/header_grid_size', 'grid-md-12'); !!}">
                <div class="grid">
                    <div class="{{ get_field('header_centered', 'option') ? 'grid-md-12' : 'grid-sm-12 grid-md-4 u-flex u-justify-content-between u-align-items-center' }}">
                        @if (is_singular('project') && false)
                            <a class="logotype logotype--back" href="{{ $archiveUrl }}"><i class="pricon pricon-left-skinny-arrow u-mr-2"></i>Tillbaka</a>
                        @else
                            {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option')) !!}
                        @endif
                        @if (strlen($navigation['mobileMenu']) > 0)
                            <button class="hamburger hamburger--spin u-ml-auto js-trigger-mobile-menu {!! apply_filters('Municipio/mobile_menu_breakpoint', 'hidden-md hidden-lg'); !!}" type="button">
                                <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        
                        @endif
                    </div>

                    @if (get_field('nav_primary_enable', 'option') === true)
                    <div class="{{ get_field('header_centered', 'option') ? 'grid-md-12' : 'grid-md-8 text-right' }} {!! apply_filters('Municipio/desktop_menu_breakpoint', 'hidden-xs hidden-sm'); !!}">
                        <nav class="{!! apply_filters('Municipio/Jumbo/NavGroupClass', 'nav-group-overflow'); !!}" data-btn-width="100">
                            {!! $navigation['mainMenu'] !!}
                            @include('partials.dropdown-menu')
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

@if (strlen($navigation['mobileMenu']) > 0)
    <nav id="mobile-menu" class="js-mobile-menu mobile-menu has-footer {!! apply_filters('Municipio/mobile_menu_breakpoint', 'hidden-md hidden-lg'); !!} hidden-print">
        <div class="mobile-menu__body u-flex align-items-center justify-content-center">
            @include('partials.mobile-menu')
        </div>
        <div class="mobile-menu__footer">
            {{-- {!!
                wp_nav_menu(array(
                    'theme_location' => 'help-menu',
                    'container' => 'nav',
                    'container_class' => 'menu-help',
                    'container_id' => '',
                    'menu_class' => 'nav nav-mobile',
                    'menu_id' => 'help-menu-top',
                    'echo' => 'echo',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    'depth' => 1,
                    'fallback_cb' => '__return_false'
                ));
            !!} --}}
        </div>
    </nav>
@endif
