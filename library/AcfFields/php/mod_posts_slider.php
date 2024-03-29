<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5fd88a970d678',
    'title' => __('Innovation theme add-on', 'municipio-innovation-theme'),
    'fields' => array(
        0 => array(
            'key' => 'field_5fd88d9613316',
            'label' => __('Enable post slider', 'municipio-innovation-theme'),
            'name' => 'enable_post_slider',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        1 => array(
            'key' => 'field_5fd8945d21b96',
            'label' => __('Module Heading Content', 'municipio-innovation-theme'),
            'name' => 'module_heading_content',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 2,
            'new_lines' => '',
        ),
        2 => array(
            'key' => 'field_5fd8952821b97',
            'label' => __('Custom archive link text', 'municipio-innovation-theme'),
            'name' => 'custom_archive_link_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        3 => array(
            'key' => 'field_60be1f26b65b0',
            'label' => __('Template Override', 'municipio-innovation-theme'),
            'name' => 'template_override',
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
                'default' => __('Default (none)', 'municipio-innovation-theme'),
                'challenge' => __('Challenge', 'municipio-innovation-theme'),
                'project' => __('Project', 'municipio-innovation-theme'),
                'event' => __('Event', 'municipio-innovation-theme'),
            ),
            'default_value' => 'default',
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
                'value' => 'mod-posts',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));
}