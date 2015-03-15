<?php namespace Reshadman\BijectiveShortener;

class BijectiveShortener implements ShortenerInterface
{
    /**
     * Allowed characters
     *
     * @var string
     */
    protected static $chars = 'YRCAtS2qcL06JzFeWIsf9HbwgVPUoOkrZpaGm47vjNEuMT1dynlDxXhQK8i5B3';

    /**
     * Make a unique string from an Integer
     *
     * @param $integer
     * @return string
     */
    public static function makeFromInteger($integer)
    {
        if ($integer == 0) return static::$chars[0];

        $number = abs($integer);

        if ($integer < 0)
            throw new \InvalidArgumentException("Can not encode for negative integers");

        $string = '';

        $base = strlen(static::$chars);

        while ($number > 0) {
            $string .= static::$chars[$number % $base];

            $number = (int) ($number / $base);
        }

        return strrev($string);
    }

    /**
     * Algorithm is reverseable or not
     *
     * @return bool
     */
    public static function canBeDecodedToInteger()
    {
        return true;
    }

    /**
     * Decode the encoded string to Integer
     *
     * @param $string
     * @return mixed
     */
    public static function decodeToInteger($string)
    {
        $stringLength = strlen($string);

        $baseLength = strlen(static::$chars);

        $id = 0;

        for($i = 0; $i < $stringLength; $i++){

            $pos = strpos(static::$chars, $string[$i]);

            $id = ($id * $baseLength) + $pos;

        }

        return $id;
    }

    /**
     * Set allowed characters to be included in the shortened string
     *
     * @param $chars
     */
    public static function setChars($chars)
    {
        static::$chars = $chars;
    }
}