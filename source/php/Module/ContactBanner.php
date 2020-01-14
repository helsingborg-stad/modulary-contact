<?php

namespace ModularityContactBanner\Module;

use ModularityContactBanner\Helper\CacheBust;

/**
 * Class ContactBanner
 * @package ModularityContact\Module
 */
class ContactBanner extends \Modularity\Module
{
    public $slug = 'contact-banner';
    public $supports = array();

    public function init()
    {
        $this->nameSingular = __("Contact banner", 'modularity-contact');
        $this->namePlural = __("Contact banners", 'modularity-contact');
        $this->description = __("Banner displaying contact details", 'modularity-contact');
    }

    /**
     * Data array
     * @return array $data
     */
    public function data() : array
    {
        $data = array();

        $data['mainContent'] = get_field('mod_contactbanner_main_content', $this->ID);

        var_dump($data);

        return $data;
    }

    /**
     * Blade Template
     * @return string
     */
    public function template() : string
    {
        return "contact-banner.blade.php";
    }

    /**
     * Style - Register & adding css
     * @return void
     */
    public function style() : void
    {
        wp_register_style(
            'modularity-contact-banner-css',
            MODULARITYCONTACTBANNER_URL . '/dist/' . CacheBust::name('css/modularity-contact-banner.css')
        );
        wp_enqueue_style('modularity-contact-banner-css');
    }

    /**
     * Available "magic" methods for modules:
     * init()            What to do on initialization
     * data()            Use to send data to view (return array)
     * style()           Enqueue style only when module is used on page
     * script            Enqueue script only when module is used on page
     * adminEnqueue()    Enqueue scripts for the module edit/add page in admin
     * template()        Return the view template (blade) the module should use when displayed
     */
}
