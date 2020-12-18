@if ($hasLeftSidebar||$hasRightSidebar)
<aside class="grid-xs-12 grid-md-auto  c-sidebar c-sidebar--right">
    @if (is_active_sidebar('right-sidebar') || (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters)))
    <div class="grid grid--columns">

        @if (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters))
            @include('partials.blog.taxonomy-filters')
        @endif

        <?php dynamic_sidebar('right-sidebar'); ?>
    </div>
    @endif
</aside>
@endif
