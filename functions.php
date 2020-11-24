<?php

define('INNOVATIONSPORTALEN_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once INNOVATIONSPORTALEN_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new INNOVATIONSPORTALEN\Vendor\Psr4ClassLoader();
$loader->addPrefix('InnovationsPortalen', INNOVATIONSPORTALEN_PATH . 'library');
$loader->addPrefix('InnovationsPortalen', INNOVATIONSPORTALEN_PATH . 'source/php/');
$loader->register();

add_action('after_setup_theme', function () {
    load_theme_textdomain('municipio-innovation-theme', get_template_directory() . '/languages');
});


new InnovationsPortalen\App();
