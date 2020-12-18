<?php

namespace InnovationsPortalen\Editor\ExtendedQuote;

use \InnovationsPortalen\Helper\Blade as Blade;

class Init
{
    public $shortcode = 'extended_quote';
    public $mcePlugin = 'mce_extended_quote';

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
            'quote' => '',
            'author' => '',
        ), $atts);

        $data = array_merge($atts, array());

        return Blade::render('library/Editor/ExtendedQuote/shortcode-extended-quote.blade.php', $data);
    }

    public function addTinyMcePlugin($plugins)
    {
        $plugins[$this->mcePlugin] = get_stylesheet_directory_uri() . '/library/Editor/ExtendedQuote/mce-extended-quote.js?v=1';
        return $plugins;
    }

    public function addTinyMcePluginButton($buttons)
    {
        $buttons[] = $this->mcePlugin;

        return $buttons;
    }
}
