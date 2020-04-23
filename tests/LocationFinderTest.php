<?php

namespace App\Service;

use PHPUnit\Framework\TestCase;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use App\Service\LocationFinder;
use App\Exception\ErrorOnFindingLocation;

class LocationFinderTest extends TestCase
{

    /**
     * @test
     */
    public function shouldNotGetStatusCodeSuccess()
    {

        $ip = '10.10.10.10';

        $mock = new MockHandler([new Response(201, [], $ip)]);
        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handler]);

        $location = new LocationFinder($guzzleClient);

        $this->expectException(ErrorOnFindingLocation::class);

        $location->findLocation($ip);

    }
}
