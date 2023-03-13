<?php

namespace Config;

use CodeIgniter\Language\Language;

class LanguageObject extends Language
{
    public function __construct()
    {
        $language = Services::language();
        parent::__construct($language->getLocale());
    }

    /**
     * Parses the language string for a file, loads the file, if necessary,
     * getting the line.
     *
     * @return object
     */
    public function getLineObject(string $line, array $args = [])
    {
        // if no file is given, just parse the line
        if (strpos($line, '.') === false) {
            return $this->formatMessage($line, $args);
        }

        // Parse out the file name and the actual alias.
        // Will load the language file and strings.
        [$file, $parsedLine] = $this->parseLine($line, $this->locale);

        $output = $this->getTranslationOutputObject($this->locale, $file, $parsedLine);

        if ($output === null && strpos($this->locale, '-')) {
            [$locale] = explode('-', $this->locale, 2);

            [$file, $parsedLine] = $this->parseLine($line, $locale);

            $output = $this->getTranslationOutputObject($locale, $file, $parsedLine);
        }

        // if still not found, try English
        if ($output === null) {
            [$file, $parsedLine] = $this->parseLine($line, 'en');

            $output = $this->getTranslationOutputObject('en', $file, $parsedLine);
        }

        return $output;
    }

    /**
     * @param string $locale
     * @param string $file
     * @param string $parsedLine
     * @return object|null
     */
    protected function getTranslationOutputObject(string $locale, string $file, string $parsedLine): ?object
    {
        $output = $this->language[$locale][$file][$parsedLine] ?? null;
        if ($output !== null) {
            return (object) $output;
        }

        foreach (explode('.', $parsedLine) as $row) {
            if (! isset($current)) {
                $current = $this->language[$locale][$file] ?? null;
            }

            $output = $current[$row] ?? null;
            if (is_array($output)) {
                $current = $output;
            }
        }

        if ($output !== null) {
            return (object) ["lang" => $output];
        }

        $row = current(explode('.', $parsedLine));
        $key = substr($parsedLine, strlen($row) + 1);

        return (object) ["lang" => $this->language[$locale][$file][$row][$key]]  ?? null;
    }

}