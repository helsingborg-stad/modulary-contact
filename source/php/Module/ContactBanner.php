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
    public $isBlockCompatible = true;

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
    public function data(): array
    {
        $data = array();
        $fieldNamespace = 'mod_contactbanner_';

        $data['mainContent'] = get_field($fieldNamespace . 'main_content', $this->ID);
        $data['headerBusinessHours'] = get_field($fieldNamespace . 'header_business_hours', $this->ID);
        $data['displayOptions'] = (array) get_field($fieldNamespace . 'display_options', $this->ID);
        $data['hours'] = (array) get_field($fieldNamespace . 'hours_list', $this->ID);

        $data['openHours'] = array();

        if (in_array('open_hours', $data['displayOptions'])) {
            foreach ($data['hours'] as $key => $time) {
                $data['openHours'][] = "<span class='c-contact-banner__weekdays'>{$time['mod_contactbanner_weekdays']}:</span> {$time['mod_contactbanner_hours_from']} — {$time['mod_contactbanner_hours_to']}";
            }
        }

        $data['abnormalHours'] = get_field($fieldNamespace . 'abnormalities_business_hours', $this->ID);

        if (empty($data['abnormalHours']['text'])) {
            $data['abnormalHours'] = false;
        }

        $data['hideMainContent'] = !in_array('main_content', $data['displayOptions']);
        $data['hideBusinessHours'] = !in_array('open_hours', $data['displayOptions']);
        $data['hideContentArea'] = $this->hideContentArea($data);

        //Map module data to camel case vars
        $data['ctaList'] = get_field($fieldNamespace . 'cta_list', $this->ID);

        //Rename array items (cta)
        \array_walk($data['ctaList'], function (&$item) use ($fieldNamespace) {
            $item = $this->renameArrayKey($fieldNamespace . "cta_title", "title", $item);
            $item = $this->renameArrayKey($fieldNamespace . "cta_icon", "icon", $item);
            $item = $this->renameArrayKey($fieldNamespace . "cta_content", "content", $item);
            $item = $this->renameArrayKey($fieldNamespace . "cta_url", "url", $item);
            $item = $this->renameArrayKey($fieldNamespace . "cta_onclick", "onclick", $item);
            $item = $this->renameArrayKey($fieldNamespace . "cta_label", "label", $item);
        });

        //Format as objects
        \array_walk($data['ctaList'], function (&$item) {
            $item = (object) $item;
        });

        //Add visual booleans for cta
        \array_walk($data['ctaList'], function (&$item) {

            //Default value
            $item->displayCta = true;

            //If label is missing, hide
            if (empty($item->label)) {
                $item->displayCta = false;
            }

            if ($item->displayCta && ($item->onclick == "" && $item->url == "")) {
                $item->displayCta = false;
            }
        });
        
        return $data;
    }

    /**
     * Tells wheter to show content area or not
     *
     * @param array $data
     * @return void
     */
    private function hideContentArea($data)
    {
        if (!empty($data['displayOptions'])) {
            return false;
        }

        return true;
    }

    /**
     * Rename array item
     * @return array
     */
    private function renameArrayKey($from, $to, $array)
    {
        $array[$to] = $array[$from];
        unset($array[$from]);
        return $array;
    }

    /**
     * Blade Template
     * @return string
     */
    public function template(): string
    {
        return "contact-banner.blade.php";
    }

    /**
     * Style - Register & adding css
     * @return void
     */
    public function style()
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
