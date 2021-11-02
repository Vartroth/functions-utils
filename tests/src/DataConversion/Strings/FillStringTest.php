<?php
namespace PHPTDD\src\DataConversion\Strings;

use PHPUnit\Framework\TestCase;
use Vartroth\Utils\DataConversion\Strings\FillString;

class FillStringTest extends TestCase
{

    /**
     * @covers Vartroth\Utils\DataConversion\Strings\FillString::exec
     **/
    public function testFillStringExec()
    {
        $this->assertEquals('Palacio de Congresos Boltaña  ', FillString::exec("Palacio de Congresos Boltaña", 30));
        $this->assertEquals('hello i am adrian   ', FillString::exec("hello i am adrian", 20));
        $this->assertEquals('   hello i am adrian', FillString::exec("hello i am adrian", 20, " ", FillString::FILL_LEFT));
        $this->assertEquals('0000012345678900000', FillString::exec("123456789", 19, "0", FillString::FILL_BOTH));
        $this->assertEquals('hello i am adrian', FillString::exec("hello i am ", 17, "adrian", FillString::FILL_RIGHT));
        $this->assertEquals(
            'are we there yet? are we there yet? are we there yet?',
            FillString::exec("are we there yet?", 53, "are we there yet? ", FillString::FILL_LEFT)
        );
    }
}
