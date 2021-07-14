<?php

define('INNOVATIONSPORTALEN_PATH', get_stylesheet_directory() . '/');
define('INNOVATIONSPORTALEN_TEXTDOMAIN', 'municipio-innovation-theme');

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
    load_theme_textdomain(INNOVATIONSPORTALEN_TEXTDOMAIN, INNOVATIONSPORTALEN_PATH . '/languages');
});

// Acf auto import and export
add_action('init', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain(INNOVATIONSPORTALEN_TEXTDOMAIN);
    $acfExportManager->setExportFolder(INNOVATIONSPORTALEN_PATH . 'library/AcfFields/');
    $acfExportManager->autoExport(array(
        'page_header' => 'group_5fd1e418be4a8',
        'header_options' => 'group_5fdbd0f942fe6',
        'mod_posts_slider' => 'group_5fd88a970d678',
        'mod_featured_section' => 'group_5fdca9bdecd66',
    ));
    $acfExportManager->import();
});


new InnovationsPortalen\App();
