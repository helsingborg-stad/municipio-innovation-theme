<?php

namespace InnovationsPortalen\Editor\PostTypeLink;

use \InnovationsPortalen\Helper\Blade as Blade;

class Init
{
    public $shortcode = 'post_type_link';
    public $mcePlugin = 'mce_post_type_link';

    public function __construct()
    {
        add_filter('init', array($this, 'addShortcode'), 10, 1);
        add_filter('mce_external_plugins', array($this, 'addTinyMcePlugin'), 10, 1);
        add_filter('mce_buttons', array($this, 'addTinyMcePluginButton'), 10, 1);
    }

    public function addShortcode()
    {
        add_shortcode($this->shortcode, array($this, 'shortcodeController'));
    }

    public function shortcodeController($atts)
    {
        $atts = shortcode_atts(array(
            'id' => 0,
            'url' => false,
            'title' => false,
            'meta' => false,
            'buttonText' => 'Öppna',
        ), $atts);

        $data = array_merge($atts, array());

        $data['post'] = get_post($atts['id']);

        return Blade::render('library/Editor/PostTypeLink/shortcode-post-type-link.blade.php', $data);
    }

    public function addTinyMcePluginButton($buttons)
    {
        $buttons[] = $this->mcePlugin;

        return $buttons;
    }

    public function addTinyMcePlugin($plugins)
    {
        $plugins[$this->mcePlugin] = get_stylesheet_directory_uri() . '/library/Editor/PostTypeLink/mce-post-type-link.js';
        return $plugins;
    }
}
