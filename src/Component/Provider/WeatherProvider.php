<?php 
namespace App\Component\Provider;
use App\Constants\WeatherConstants;
use App\Factory\OpenWeather;
use App\Factory\SomeOther;
use App\Factory\WeatherFactoryInterface;

class WeatherProvider implements WeatherProviderInterface
{

	public function __construct($baseUrl,$apiKey)
	{
		$this->baseUrl = $baseUrl;
		$this->apiKey = $apiKey;
	}
	/**
	 * Creates an object for fetching the weather details
     * @param int $providerType
     *
     * @return WeatherFactoryInterface
     */
	public function getProvider(int $type) : WeatherFactoryInterface
	{
		switch($type){
			case WeatherConstants::OPEN_WEATHER :  
				$weatherProvider = new OpenWeather();
				break;

			case WeatherConstants::SOME_OTHER:   
				$weatherProvider = new SomeOther();
				break;

			default:  
				$weatherProvider = new OpenWeather();
				break;
		}

		$weatherProvider->setBaseUrl($this->baseUrl);
		$weatherProvider->setApiKey($this->apiKey);

		return $weatherProvider;
	}
}