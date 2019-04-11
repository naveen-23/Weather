<?php 
namespace App\Factory;

interface WeatherFactoryInterface
{

	public function setBaseUrl($baseUrl):void;
	public function setApiKey($apiKey):void;
	public function getResponse(string $cityName):array;
	public function transformResponse(array $data):array;
}