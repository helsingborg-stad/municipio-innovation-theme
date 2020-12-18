@extends('templates.master')

@section('content')
    @if (is_active_sidebar('content-area'))
        <section class="u-py-5">
            <div class="container">
                <div class="grid grid--columns">
                    <?php dynamic_sidebar('content-area'); ?>
                </div>
            </div>
        </section>
    @endif
@stop
