<?php

namespace App\Service;

use PHPUnit\Framework\TestCase;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use App\Service\IPFinder;

class IPFinderTest extends TestCase
{
    /**
     * @test
     */
    public function checkFindIp()
    {

       $mock = new MockHandler([new Response(200, [], '127.0.0.1')]);
       $handler = HandlerStack::create($mock);
       $guzzleClient = new Client(['handler' => $handler]);

        $ipFinder = new IPFinder($guzzleClient);
        $this->assertEquals("127.0.0.1", $ipFinder->findIp());

    }
}
