<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5fdca9bdecd66',
    'title' => __('Innovation Theme Add-on - Featured Section', 'municipio-innovation-theme'),
    'fields' => array(
        0 => array(
            'key' => 'field_5fdca9e9e070c',
            'label' => __('Image width', 'municipio-innovation-theme'),
            'name' => 'image_width',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => __('px', 'municipio-innovation-theme'),
            'min' => '',
            'max' => '',
            'step' => '',
        ),
        1 => array(
            'key' => 'field_5fdcaa01e070d',
            'label' => __('Image height', 'municipio-innovation-theme'),
            'name' => 'image_height',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => __('px', 'municipio-innovation-theme'),
            'min' => '',
            'max' => '',
            'step' => '',
        ),
        2 => array(
            'key' => 'field_5fdcab6ac88a3',
            'label' => __('Content column size', 'municipio-innovation-theme'),
            'name' => 'content_column_size',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                7 => __('7 / 12 (Default)', 'municipio-innovation-theme'),
                6 => __('6 / 12 (50 %)', 'municipio-innovation-theme'),
                5 => __('5 / 12', 'municipio-innovation-theme'),
                4 => __('4 / 12 (33 %)', 'municipio-innovation-theme'),
                3 => __('3 / 12 (25 %)', 'municipio-innovation-theme'),
            ),
            'default_value' => array(
                0 => 7,
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'mod-section-featured',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));
}