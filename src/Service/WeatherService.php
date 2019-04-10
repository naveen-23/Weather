<?php 
namespace App\Service;

use App\Constants\WeatherConstants;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Component\Provider\WeatherProvider;

class WeatherService 
{
	/*
	* Gets weather provider 
	*/
	public function getWeatherProvider()
	{
		$weatherProvider = new WeatherProvider();
		$weatherProvider = $weatherProvider->getProvider(WeatherConstants::OPEN_WEATHER);

		return $weatherProvider;
	}
	/**
	*  @Param string cityName 
	*	@return array
	*/
	public function getWeatherData(string $cityName) : array
	{
		$weatherProvider = $this->getWeatherProvider();

		$response = $weatherProvider->getResponse($cityName);

		$weatherData = $weatherProvider->transformResponse($response);

		return $weatherData;
	}
}