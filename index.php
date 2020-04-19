<?php

require  __DIR__ . "/vendor/autoload.php";

use App\Service\IPFizzBuzz;

$ip = new IPFizzBuzz();

return $ip->getFizzBuzzByIP('143.0.0');
