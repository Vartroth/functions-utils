<?php
namespace PHPTDD\src\DataConversion\Strings;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\DataConversion\Strings\SanitizerStringUrl;

class SanitizerStringUrlTest extends TestCase
{

    public function stringForTestSanitizeUrl(): array
    {
        return [
            ['i am', 'i-am'],
            ['$', 'dollars'],
            ['&stúpid', 'andstupid'],
        ];
    }

    /**
     * @covers Vartroth\Utils\DataConversion\Strings\SanitizerStringUrl::exec
     * @dataProvider stringForTestSanitizeUrl
     **/
    public function testSanitizerStringUrlExec($input, $expected)
    {
        $this->assertEquals($expected, SanitizerStringUrl::exec($input));
    }
}
