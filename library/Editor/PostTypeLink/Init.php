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
        $data = array();
        $post = get_post($atts['id']);

        if ($post) {
            $atts = shortcode_atts(array(
                'id' => 0,
                'title' => $post->post_title,
                'meta' => get_post_type_object($post->post_type)->labels->singular_name,
                'url' => get_permalink($post->ID),
                'imageUrl' => municipio_get_thumbnail_source($post->ID, array(75,56), '3:2'),
                'buttonText' => __('Öppna', INNOVATIONSPORTALEN_TEXTDOMAIN),
            ), $atts);
       
            $data = array_merge($atts, array());
        }

        // Show error to logged in users
        if (empty($post) && empty($atts) && is_user_logged_in()) {
            return __('Please define a valid post id or overrride fields', INNOVATIONSPORTALEN_TEXTDOMAIN);
        }

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
