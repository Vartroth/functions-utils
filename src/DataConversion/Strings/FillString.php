<?php

declare (strict_types = 1);

namespace Vartroth\Utils\DataConversion\Strings;

class FillString
{

    const DEFAULT_STRING = " ";
    const FILL_RIGHT = STR_PAD_RIGHT;
    const FILL_LEFT = STR_PAD_LEFT;
    const FILL_BOTH = STR_PAD_BOTH;

    /**
     * exec function
     *
     * @param string $input
     * @param integer $lenght is the final lenght of the string
     * @param string $string is a string who use to fill the string
     * @param integer $type Optional argument can be FILL_RIGHT, FILL_LEFT, or FILL_BOTH. If pad_type is not specified it is assumed to be FILL_RIGHT
     * @return void
     */
    public static function exec(
        string $input,
        int $lenght,
        string $string = self::DEFAULT_STRING,
        int $type = self::FILL_RIGHT
    ): string {
        return str_pad($input, $lenght, $string, $type);
    }
}
