<?php 
namespace App\Factory;
use GuzzleHttp\Client;
use App\Model\Weather;

class OpenWeather implements WeatherFactoryInterface
{	
	// since its Restricted by API Key using a sample json below
	const BASE_URL = "https://api.openweathermap.org/data/2.5/weather";

	//const BASE_URL = 'http://localhost/weather.json';
	CONST API_KEY = '2fa8dfcd39e66b46014e6c9765351a90';
	// 
	
	/**
	*  @Param string cityName 
	*	@return array
	*/
	public function getResponse(string $cityName):array
	{
		try 
		{
		$param = "?".$cityName.'&appid='.SELF::API_KEY;
		$client = new \GuzzleHttp\Client(['base_uri' => SELF::BASE_URL]);
		
		$returnData = [];
		$response = $client->request('GET', $param);
		

			if($response->getStatusCode() == 200){
				$data = json_decode($response->getBody(),true);

				$weather = new Weather();
				$weather->setJsonData($data);

				$returnData = $weather->getRequriedData();
			}
		} catch (\Exception $ex)
		{

			var_dump($ex->getMessage());
			exit();
			return ['error'=>$ex->getMessage()];
		}

		return $returnData;
	}

	/**
	*  @Param array data 
	*	@return array
	*/
	public function transformResponse(array $data):array
	{
		return $data;
	}
}