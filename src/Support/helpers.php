<?php

if (! function_exists('parse_langs_to_array')) {
    /**
     * Parse a simple string comma-separated to array.
     * @see split_srt_to_simple_array.
     * @param string $str
     *
     * @return array
     */
    function parse_langs_to_array($str)
    {
        if (is_array($str)) {
            return $str;
        }

        return split_str_to_simple_array($str);
    }
}

if (! function_exists('split_str_to_simple_array')) {
    /**
     * Parse a simple string comma-separated to array. It also allow to use simple
     * indexes, like: "something:awesome, locale:pt-br, country:brazil".
     *
     * @param string $str
     *
     * @return array
     */
    function split_str_to_simple_array($str)
    {
        $array = [];

        /* split pairs of comma-separated values into items */
        $items = preg_split('/\s*,\s*/', $str);

        foreach ($items as $item) {
            /* split index:value of each pair of items*/
            $pairs = preg_split('/\s*(:=|:|=>|=)\s*/', $item);

            if (count($pairs) == 2) {
                $array[$pairs[0]] = $pairs[1];
            } else {
                $array[] = $pairs[0];
            }
        }

        return $array;
    }
}
