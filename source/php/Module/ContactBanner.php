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
        $postId = $this->ID;
        $fieldNamespace = 'mod_contactbanner_';
        $data['fieldNamespace'] = $fieldNamespace;

        $data['headerMainContent'] = get_the_title($postId);
        $data['mainContent'] = get_field($fieldNamespace . 'main_content', $postId);
        $data['headerBusinessHours'] = get_field($fieldNamespace . 'header_business_hours', $postId);
        $data['abnormalitiesBusinessHours'] = get_field($fieldNamespace . 'abnormalities_business_hours', $postId);
        $data['hoursList'] = get_field($fieldNamespace . 'hours_list', $postId);
        $data['ctaList'] = get_field($fieldNamespace . 'cta_list', $postId);
        $data['labelMoreInfo'] = get_field($fieldNamespace . 'label_more_info', $postId);
        $data['urlMoreInfo'] = get_field($fieldNamespace . 'url_more_info', $postId);

        \array_walk($data['ctaList'], function(&$item) {
            $file = get_attached_file($item['mod_contactbanner_cta_icon'], true);
            $item['mod_contactbanner_cta_icon'] = \file_get_contents($file);
        });

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
