<?php 
namespace App\Factory;
use Symfony\Component\HttpFoundation\JsonResponse;

class SomeOther implements WeatherFactoryInterface
{

	/**
	*  @param string baseUrl
	*/
	public function setBaseUrl($baseUrl):void
	{
		$this->baseUrl = $baseUrl;
	}

	/**
	*  @param string apiKey
	*/
	public function setApiKey($apiKey):void
	{
		$this->apiKey = $apiKey;
	}

	public function getResponse(string $cityName):array
	{
		return ['someother'];
	}

	public function transformResponse(array $data):array
	{
		return $data;
	}
}