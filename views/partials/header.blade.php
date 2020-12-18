@if (isset($headerLayout['customizer']) && $headerLayout['customizer'])
    @include('partials.header.' . $headerLayout['template'])
    @include('partials.hero')
@else
    <header id="site-header" class="site-header {{ $headerLayout['classes'] }} {{ apply_filters('Municipio/header_transparent', false) ? 'site-header-transparent' : '' }}">
        <div class="print-only container">
            <div class="grid">
                <div class="grid-sm-12">
                    {!! municipio_get_logotype('standard') !!}
                </div>
            </div>
        </div>

        @include('partials.header.' . $headerLayout['template'])
    </header>

    @include('partials.hero')

    @if (is_active_sidebar('top-sidebar'))
        <?php dynamic_sidebar('top-sidebar'); ?>
    @endif
@endif


