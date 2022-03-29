<?php

declare (strict_types = 1);

namespace Vartroth\Utils\Validation;

class SpanishNifValidator
{

    const DNI_NUMBER_LENGHT = 8;
    const NIE_FIRST_VALID_LETTERS = 'XYZ';
    const DNI_NIE_VALID_LETTERS = 'TRWAGMYFPDXBNJZSQVHLCKE';

    const DNI_REGEX = '/^[0-9]{8}[' . self::DNI_NIE_VALID_LETTERS . ']$/';
    const NIE_REGEX = '/^[' . self::NIE_FIRST_VALID_LETTERS . '][0-9]{7}[' . self::DNI_NIE_VALID_LETTERS . ']$/';

    /**
     * @param string $nif
     * @return bool
     */
    public static function isValid(string $nif): bool
    {
        return (self::isValidDni($nif) || self::isValidNie($nif));
    }

    /**
     * @param string $dni
     * @return bool
     */
    public static function isValidDni(string $dni): bool
    {
        if (!preg_match(self::DNI_REGEX, $dni)) {
            return false;
        }
        $numers = substr($dni, 0, self::DNI_NUMBER_LENGHT);

        return self::DNI_NIE_VALID_LETTERS[$numers % 23] === substr($dni, -1);
    }

    /**
     * @param string $nie
     * @return bool
     */
    public static function isValidNie(string $nie): bool
    {
        if (!preg_match(self::NIE_REGEX, $nie)) {
            return false;
        }
        $replaced = str_replace(['X', 'Y', 'Z'], [0, 1, 2], $nie);
        return self::isValidDni($replaced);
    }

}
