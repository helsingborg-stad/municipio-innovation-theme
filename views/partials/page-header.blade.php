
@php $template = !empty($template) ? $template : 'center'; @endphp
@includeIf('partials.page-header.' . $template)