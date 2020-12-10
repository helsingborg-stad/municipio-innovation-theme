<?php
namespace InnovationsPortalen;

class App
{
    public function __construct()
    {
        new \InnovationsPortalen\Editor\ExtendedQuote\Init();
        new \InnovationsPortalen\Editor\PostTypeLink\Init();
        new \InnovationsPortalen\Theme\Enqueue();
        add_action('wp_enqueue_scripts', array($this, 'enqueueRobotoFont'));
        add_filter('the_content', array($this, 'removeParagraphWrappingFromImages'), 20, 1);
    }

    public function removeParagraphWrappingFromImages($content)
    {
        return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
    }


    public function enqueueRobotoFont()
    {
        wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');
    }
}
