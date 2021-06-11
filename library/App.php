<?php
namespace InnovationsPortalen;

class App
{
    public function __construct()
    {
        new \InnovationsPortalen\Modularity\Posts();
        new \InnovationsPortalen\Municipio\SiteHeader();
        new \InnovationsPortalen\Editor\ExtendedQuote\Init();
        new \InnovationsPortalen\Editor\PostTypeLink\Init();
        new \InnovationsPortalen\Theme\Enqueue();
        add_action('wp_enqueue_scripts', array($this, 'enqueueRobotoFont'));
        add_filter('the_content', array($this, 'removeParagraphWrappingFromImages'), 20, 1);
        add_filter('Municipio/Theme/Enqueue/deferedLoadingJavascript/disable', '__return_true', 99);
        add_filter('Municipio/load-wp-jquery', '__return_true', 99);
        add_action('wp_head', array($this, 'fixTranslatePressStyles'), 10);
    }

    public function fixTranslatePressStyles()
    {
        if (!is_user_logged_in()
            || empty($_GET['trp-edit-translation'])
            || $_GET['trp-edit-translation'] !== 'true') {
            return;
        }

        $customCSS = '
            #wpadminbar,
            #site-header {
                display: none;
            }
            body.logged-in {
                margin-top: 0 !important;
            }
        ';

        echo '<style>' . $customCSS . '</style>';
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
