<?php

namespace Vartroth\Utils\Tests;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\DataConversion\Strings\SanitizerStringFile;
use Vartroth\Utils\DataConversion\Strings\SanitizerStringUrl;

class SanitizerStringTest extends TestCase
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
     * @dataProvider stringForTestSanitizeUrl
     */
    public function testEncodeFileEntites($input, $expected): void
    {
        $this->assertEquals($expected, SanitizerStringUrl::exec($input));
    }

    public function stringForTestSanitizeFile(): array
    {
        return [
            ['this **is _my_ file.pdf', 'this_is_my_file.pdf'],
            ['I love my class(1).jpg', 'i_love_my_class1.jpg'],
            ['& i am stúpid.png', 'and_i_am_stupid.png'],
        ];
    }

    /**
     * @dataProvider stringForTestSanitizeFile
     */
    public function testEncodeUrlEntites($input, $expected): void
    {
        $this->assertEquals($expected, SanitizerStringFile::exec($input));
    }
}
