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
if (!defined('WPINC')) {
    die;
}

define('MODULARITYCONTACT_PATH', plugin_dir_path(__FILE__));
define('MODULARITYCONTACT_URL', plugins_url('', __FILE__));
define('MODULARITYCONTACT_TEMPLATE_PATH', MODULARITYCONTACT_PATH . 'templates/');
define('MODULARITYCONTACT_MODULE_PATH', MODULARITYCONTACT_PATH . 'source/php/Module/');

load_plugin_textdomain('modularity-contact', false, plugin_basename(dirname(__FILE__)) . '/languages');

require_once MODULARITYCONTACT_PATH . 'source/php/Vendor/Psr4ClassLoader.php';
require_once MODULARITYCONTACT_PATH . 'Public.php';

// Instantiate and register the autoloader
$loader = new ModularityContact\Vendor\Psr4ClassLoader();
$loader->addPrefix('ModularityContact', MODULARITYCONTACT_PATH);
$loader->addPrefix('ModularityContact', MODULARITYCONTACT_PATH . 'source/php/');
$loader->register();

// Start application
new ModularityContact\App();

// Acf auto import and export
add_action('plugins_loaded', function() {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('modularity-contact');
    $acfExportManager->setExportFolder(MODULARITYCONTACT_PATH . 'acf-fields/');
    $acfExportManager->autoExport(array(
        'modularity-contact' => 'group_5e1d8f163f200',
    ));
    $acfExportManager->import();
});

// Registers the module
add_action('plugins_loaded', function() {
    if (function_exists('modularity_register_module')) {
        modularity_register_module(
            MODULARITYCONTACT_MODULE_PATH,
            'ContactBanner'
        );
    }
});

// Add module template dir
// add_filter('Modularity/Module/TemplatePath', function ($paths) {
//     $paths[] = MODULARITYCONTACT_PATH . 'source/php/Module/views/';
//     return $paths;
// });
