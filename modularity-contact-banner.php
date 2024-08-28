<?php

/**
 * Plugin Name:       Modularity Contact Banner
 * Plugin URI:        https://github.com/helsingborg-stad/modularity-contact
 * Description:       Modularity Contact Banner
 * Version: 3.2.0
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
define('MODULARITYCONTACTBANNER_MODULE_VIEW_PATH', plugin_dir_path(__FILE__) . 'source/php/Module/views');
define('MODULARITYCONTACTBANNER_MODULE_PATH', MODULARITYCONTACTBANNER_PATH . 'source/php/Module/');

load_plugin_textdomain('modularity-contact-banner', false, plugin_basename(dirname(__FILE__)) . '/languages');

// Autoload from plugin
if (file_exists(MODULARITYCONTACTBANNER_PATH . 'vendor/autoload.php')) {
    require_once MODULARITYCONTACTBANNER_PATH . 'vendor/autoload.php';
}
require_once MODULARITYCONTACTBANNER_PATH . 'Public.php';

// Modularity 3.0 ready - ViewPath for Component library
add_filter('/Modularity/externalViewPath', function ($arr) {
    $arr['mod-contact-banner'] = MODULARITYCONTACTBANNER_MODULE_VIEW_PATH;
    return $arr;
}, 10, 3);


// Start application
new ModularityContactBanner\App();

// Acf auto import and export
add_action('plugins_loaded', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('modularity-contact-banner');
    $acfExportManager->setExportFolder(MODULARITYCONTACTBANNER_PATH . 'acf-fields/');
    $acfExportManager->autoExport(array(
        'modularity-contact-banner' => 'group_5e1d8f163f200',
    ));
    $acfExportManager->import();
});