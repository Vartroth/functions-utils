<?php
namespace PHPTDD\src\Utils;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Vartroth\Utils\Utils\PasswordGenerator;

class PasswordGeneratorTest extends TestCase
{

    /**
     * This code will run before each test executes
     * @return void
     */
    protected function setUp(): void
    {

    }

    /**
     * This code will run after each test executes
     * @return void
     */
    protected function tearDown(): void
    {

    }

    /**
     * @covers Vartroth\Utils\Utils\PasswordGenerator
     **/
    public function testPasswordGeneratorTypeException()
    {
        $this->expectException(InvalidArgumentException::class);
        $psw = PasswordGenerator::exec(5);
    }

    /**
     * @covers Vartroth\Utils\Utils\PasswordGenerator
     **/
    public function testPasswordGenerator()
    {
        $pswEasy = PasswordGenerator::exec(PasswordGenerator::EASY);
        $pswMedium = PasswordGenerator::exec(PasswordGenerator::MEDIUM);

        $this->assertEquals(PasswordGenerator::DEFAULT_LENGHT, strlen($pswEasy));
        $this->assertTrue(is_string($pswMedium));
    }
}
