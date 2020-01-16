<?php

namespace ModularityContactBanner;

class App
{
    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'registerModule'));
    }

    /**
     * Register the module
     * @return void
     */
    public function registerModule()
    {
        if (function_exists('modularity_register_module')) {
            modularity_register_module(
                MODULARITYCONTACTBANNER_MODULE_PATH,
                'ContactBanner'
            );
        }
    }
}
