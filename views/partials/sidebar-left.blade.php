@if ($hasLeftSidebar||$hasRightSidebar)
<aside class="grid-lg-3 sidebar-left-sidebar-disabled hidden-print @if(!$hasLeftSidebar && $hasRightSidebar) hidden-lg @endif">
    @if (is_author())
        @include('partials.author-box')
    @endif

    @if (is_active_sidebar('left-sidebar'))
        <div class="grid grid--columns sidebar-left-sidebar-top hidden-xs hidden-sm hidden-md">
            <?php dynamic_sidebar('left-sidebar'); ?>
        </div>
    @endif

    @if (get_field('nav_sub_enable', 'option'))
    {!! $navigation['sidebarMenu'] !!}
    @endif

    <!-- Use right sidebar to the left in small-ish devices -->
    @if (is_active_sidebar('left-sidebar')||$hasRightSidebar)
        <div class="grid grid--columns sidebar-left-sidebar-top hidden-lg u-hidden@xl">
            <?php dynamic_sidebar('left-sidebar'); ?>
            <?php dynamic_sidebar('right-sidebar'); ?>
        </div>
    @endif

    @if (is_active_sidebar('left-sidebar-bottom'))
        <div class="grid grid--columns sidebar-left-sidebar-bottom">
            <?php dynamic_sidebar('left-sidebar-bottom'); ?>
        </div>
    @endif

</aside>
@endif