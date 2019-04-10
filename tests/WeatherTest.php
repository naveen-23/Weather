<?php 
namespace App\tests;
use GuzzleHttp\Client;

use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testWeather()
    {
    	$client = new \GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:8000/api/v1/get-weather/bangalore']);
    	$response = $client->request("GET", "");


        $this->assertEquals(200, $response->getStatusCode());
    }
}
