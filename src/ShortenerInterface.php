<?php namespace Reshadman\BijectiveShortener;


interface ShortenerInterface {
    /**
     * Make a unique string from an Integer
     *
     * @param $integer
     * @return string
     */
    public static function makeFromInteger($integer);

    /**
     * Algorithm is reverseable or not
     *
     * @return bool
     */
    public static function canBeDecodedToInteger();

    /**
     * Decode the encoded string to Integer
     *
     * @param $string
     * @return mixed
     */
    public static function decodeToInteger($string);

    /**
     * Set allowable characters to be included in the shortened string
     *
     * @param $chars
     * @return void
     */
    public static function setChars($chars);
}