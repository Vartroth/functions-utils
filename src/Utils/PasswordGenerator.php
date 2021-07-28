<?php

declare (strict_types = 1);

namespace Vartroth\Utils\Utils;

use InvalidArgumentException;

/**
 * @testFunction testPasswordGenerator
 */
final class PasswordGenerator
{
    const EASY = 1;
    const MEDIUM = 2;
    const HARD = 3;
    const DEFAULT_LENGHT = 15;

    const LIST_ARRAYS = [
        1 => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
        2 => "1234567890",
        3 => "-=~!@#$%^&*()_+,./<>?;:[]{}\|",
    ];

    /**
     * @param int $lenght
     * @param int $type
     * @return string
     * @throws InvalidArgumentException
     */
    public static function exec(
        int $type = self::HARD,
        int $lenght = self::DEFAULT_LENGHT
    ): string {

        if ($type > sizeof(self::LIST_ARRAYS) || $type <= 0) {
            throw new InvalidArgumentException(
                sprintf("The type value '%d' is not valid", $type)
            );
        }

        $string = "";
        for ($i = 1; $i <= $type; $i++) {
            $string .= self::LIST_ARRAYS[$i];
        }

        $random = "";

        for ($i = 0; $i < $lenght; $i++) {
            $random .= $string[rand(0, strlen($string))];
        }

        return $random;
    }
}
