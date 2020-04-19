<?php

namespace App\Service;

use App\Exception\InvalidIP4Format;
use PHPUnit\Framework\TestCase;

class IPFizzBuzzTest extends TestCase
{
    private $ipFizzBuzz;

    public function setUp(): void
    {
        $this->ipFizzBuzz = new IPFizzBuzz();
    }

    /**
     * @test
     */
    public function shouldReturnFizz()
    {
        $this->assertEquals("Fizz", $this->ipFizzBuzz->getFizzBuzzByIP("127.0.0.3"));
    }

    /**
     * @test
     */
     public function shouldReturnBuzz()
     {
        $this->assertEquals("Buzz", $this->ipFizzBuzz->getFizzBuzzByIP("127.0.0.5"));
     }

    /**
     * @test
     */
    public function shouldReturnFizzBuzz()
    {
        $this->assertEquals("FizzBuzz", $this->ipFizzBuzz->getFizzBuzzByIP("127.0.0.15"));
    }

    /**
     * @test
     */
    public function shouldSameReturn()
    {
        $numberPartD = 11;
        $this->assertEquals($numberPartD, $this->ipFizzBuzz->getFizzBuzzByIP("10.10.10.".$numberPartD));
    }

    /**
     * @test
     */
    public function emptyIP()
    {
        $this->expectException(InvalidIP4Format::class);

        $this->ipFizzBuzz->getFizzBuzzByIP('');
    }

    /**
     * @test
     */
    public function notAllPartsOfIP()
    {
        $this->expectException(InvalidIP4Format::class);

        $this->ipFizzBuzz->getFizzBuzzByIP("127.0.0");
    }

    /**
     * @test
     */
    public function noArgumentInMethod()
    {
        $this->expectException(\ArgumentCountError::class);

        $this->ipFizzBuzz->getFizzBuzzByIP();
    }

}
