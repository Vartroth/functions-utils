<?php

namespace Vartroth\Utils\DataConversion\Strings;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\DataConversion\Strings\SanitizerStringFile;

class SanitizerStringTest extends TestCase
{

    public function testEncodeFileEntites(): void
    {
        $input = "See if 'you' can sanitize me please! & send THE RESULT";
        $expected = "see_if_you_can_sanitize_me_please_and_send_the_result";
        $this->assertEquals(
            $expected,
            SanitizerStringFile::exec($input)
        );
    }

    public function testEncodeUrlEntites(): void
    {
        $input = "My url is only for pay my $.COM";
        $expected = "my-url-is-only-for-pay-my-dollars.com";
        $this->assertEquals(
            $expected,
            SanitizerStringUrl::exec($input)
        );
    }
}
