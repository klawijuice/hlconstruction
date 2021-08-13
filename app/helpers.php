<?php

// Located in app/helpers.php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (!function_exists('translations')) {
    function translations($json)
    {
        if (!file_exists($json)) {
            return [];
        }
        return json_decode(file_get_contents($json), true);
    }
}

if (!function_exists('getSupportedLocales')) {
    function getSupportedLocales()
    {
        return LaravelLocalization::getSupportedLocales();
    }
}
if (!function_exists('getLocalizedURL')) {
    function getLocalizedURL($locale, $param1 = null, $param2 = [], $param3 = true)
    {
        return LaravelLocalization::getLocalizedURL($locale, $param1, $param2, $param3);
    }
}
