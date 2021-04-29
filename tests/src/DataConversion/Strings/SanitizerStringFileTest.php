<?php
namespace PHPTDD\src\DataConversion\Strings;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\DataConversion\Strings\SanitizerStringFile;

class SanitizerStringFileTest extends TestCase
{

    public function stringForTestSanitizeFile(): array
    {
        return [
            ['this **is _my_ file.pdf', 'this_is_my_file.pdf'],
            ['I love my class(1).jpg', 'i_love_my_class1.jpg'],
            ['& i am stúpid.png', 'and_i_am_stupid.png'],
        ];
    }

    /**
     * @covers Vartroth\Utils\DataConversion\Strings\SanitizerStringFile::exec
     * @dataProvider stringForTestSanitizeFile
     **/
    public function testSanitizerStringFileExec($input, $expected)
    {
        $this->assertEquals($expected, SanitizerStringFile::exec($input));
    }
}
