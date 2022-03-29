<?php
declare (strict_types = 1);

namespace PHPTDD\src\Validation;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\Validation\SpanishNifValidator;

class SpanishNifValidatorTest extends TestCase
{

    /**
     * @covers Vartroth\Utils\Validation\SpanishNifValidator
     **/
    public function testIsDniAndNif()
    {
        $this->assertTrue(SpanishNifValidator::isValid('98566274G')); //Valid DNI
        $this->assertTrue(SpanishNifValidator::isValid('Y6001394H')); //Valid NIE
        $this->assertFalse(SpanishNifValidator::isValidDni('46462150Y'));
        $this->assertFalse(SpanishNifValidator::isValidNie('R1371148F'));
    }
}
