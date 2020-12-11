@if (is_active_sidebar('content-area-bottom'))
    <footer class="content-bottom o-section t-foreground o-section--content-bottom">
        <div class="container sidebar-content-area-bottom">
            <div class="grid grid--columns">
                <?php dynamic_sidebar('content-area-bottom'); ?>
            </div>
        </div>
    </footer>
@endif