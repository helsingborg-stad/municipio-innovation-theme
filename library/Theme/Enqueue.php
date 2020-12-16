<?php

namespace InnovationsPortalen\Theme;

use InnovationsPortalen\Helper\CacheBust as CacheBust;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'), 20);
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style(
            'InnovationsPortalen',
            get_stylesheet_directory_uri() .
                        '/assets/dist/' .
                        CacheBust::name('css/child-theme.css'),
            array(),
            ''
        );
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_register_script(
            'InnovationsPortalen-js',
            get_stylesheet_directory_uri() .
                        '/assets/dist/' .
                        CacheBust::name('js/child-theme.js'),
            array('jquery'),
            false,
            true
        );

        wp_enqueue_script('InnovationsPortalen-js');
    }
}
