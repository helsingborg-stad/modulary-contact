<?php

namespace ModularityContact;

class App
{
    public function __construct()
    {
        if (!is_admin()) {
            return false;
        }
    }
}
