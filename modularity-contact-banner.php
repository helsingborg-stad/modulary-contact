<?php

/**
 * Plugin Name:       Modularity Contact Banner
 * Plugin URI:        https://github.com/helsingborg-stad/modularity-contact
 * Description:       Modularity Contact Banner
 * Version:           1.0.0
 * Author:            Sebastian Thulin
 * Author URI:        https://github.com/helsingborg-stad
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       modularity-contact
 * Domain Path:       /languages
 */

// Protect agains direct file access
if (!defined('WPINC')) die;

define('MODULARITYCONTACTBANNER_PATH', plugin_dir_path(__FILE__));
define('MODULARITYCONTACTBANNER_URL', plugins_url('', __FILE__));
define('MODULARITYCONTACTBANNER_TEMPLATE_PATH', MODULARITYCONTACTBANNER_PATH . 'templates/');
define('MODULARITYCONTACTBANNER_MODULE_PATH', MODULARITYCONTACTBANNER_PATH . 'source/php/Module/');

load_plugin_textdomain('modularity-contact-banner', false, plugin_basename(dirname(__FILE__)) . '/languages');

require_once MODULARITYCONTACTBANNER_PATH . 'source/php/Vendor/Psr4ClassLoader.php';
require_once MODULARITYCONTACTBANNER_PATH . 'Public.php';

// Instantiate and register the autoloader
$loader = new ModularityContactBanner\Vendor\Psr4ClassLoader();
$loader->addPrefix('ModularityContactBanner', MODULARITYCONTACTBANNER_PATH);
$loader->addPrefix('ModularityContactBanner', MODULARITYCONTACTBANNER_PATH . 'source/php/');
$loader->register();

// Start application
new ModularityContactBanner\App();

// Acf auto import and export
add_action('plugins_loaded', function() {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('modularity-contact-banner');
    $acfExportManager->setExportFolder(MODULARITYCONTACTBANNER_PATH . 'acf-fields/');
    $acfExportManager->autoExport(array(
        'modularity-contact-banner' => 'group_5e1d8f163f200',
    ));
    $acfExportManager->import();
});