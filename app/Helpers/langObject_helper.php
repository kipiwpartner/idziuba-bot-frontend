<?php

use Config\Services;

if(!function_exists('langObj')){
    /**
     * A convenience method to translate a string or array of them and format
     * the result with the intl extension's MessageFormatter.
     *
     * @param string $line
     * @param array $args
     * @param string|null $locale
     * @return object
     */
    function langObj(string $line, array $args = [], ?string $locale = null): object
    {
        $language = Services::langObj();

        // Get active locale
        $activeLocale = $language->getLocale();

        if ($locale && $locale !== $activeLocale) {
            $language->setLocale($locale);
        }

        $line = $language->getLineObject($line, $args);

        if ($locale && $locale !== $activeLocale) {
            // Reset to active locale
            $language->setLocale($activeLocale);
        }

        return (object) $line;
    }
}