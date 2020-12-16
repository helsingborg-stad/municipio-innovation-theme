@php
    // Sketchy implementation of extra view controller
    $viewDataFromController = get_defined_vars()['__data'];
    extract(\InnovationsPortalen\Modularity\Posts::data($viewDataFromController));
@endphp

@includeWhen(!empty($slider), 'template-posts-slider');
@includeWhen(empty($slider), 'template-posts');