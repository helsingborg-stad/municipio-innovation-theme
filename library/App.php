<?php
namespace InnovationsPortalen;

class App
{
    public function __construct()
    {
        new \InnovationsPortalen\Theme\Enqueue();
        add_action('wp_enqueue_scripts', array($this, 'enqueueRobotoFont'));
    }


    public function enqueueRobotoFont()
    {
        wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Roboto');
    }
}
