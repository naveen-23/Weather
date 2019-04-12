<?php 
namespace App\Factory;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\AppConstants;

class OpenWeather implements WeatherFactoryInterface
{	

	private $baseUrl;
	private $apiKey;
	private $jsonData;
	private $reqData;

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
	
	/**
	*  @param json jsonData
	*/
	public function setJsonData($jsonData):void
	{
		$this->jsonData = $jsonData;
	}
	public function getJsondata()
	{
		return $this->jsonData;
	}
	/**
	*  Gets the Response from the API
	*  @param string cityName 
	*	@return array
	*/
	public function getResponse(string $cityName):array
	{
		try 
		{
			$param = $this->getParams($cityName);
			$client = new \GuzzleHttp\Client(['base_uri' => $this->baseUrl]);

			$returnData = [];
			$response = $client->request('GET', $param);

			if($response->getStatusCode() == Response::HTTP_OK){
				$data = json_decode($response->getBody(),true);

				$this->setJsonData($data);
				return $this->getJsondata();
			}
		} catch (\Exception $ex)
		{
			throw new \Exception('Response fetch failed');
		}

		return $returnData;
	}

	/**
	* Transform the response to user required format
	*   @param array data 
	*	@return array
	*/
	public function transformResponse(array $data):array
	{
		$this->reqData = $this->getRequriedData();

		return $this->reqData;
	}

	/**
	*  Makes the Params list for fetching the api response
	*  @param String cityName
	*  @return string
	*/
	public function getParams(string $cityName):string
	{
		$param = '?q='.$cityName.'&appid='.$this->apiKey;

		return $param;
	}

	/**
	*	Loop through the json response and fetch only required fields
	*/
	public function getRequriedData()
	{
		$reqData = [] ;
		// Loop through the json and fetch only the required fields
		foreach($this->jsonData as $ky =>$list)
		{
			if(in_array($ky,array_keys(AppConstants::REQ_FIELDS)))
			{
				$val = $list;
				
				if($ky == AppConstants::CONVERT_FIELDS)
				{
					// use only main for field
					$val = $list[0]['main'];
				}
				if($ky == AppConstants::FORMAT_FIELD_MAIN)
				{
					$val[AppConstants::FORMAT_FIELDS]= $this->getDirection($val[AppConstants::FORMAT_FIELDS]);
				}
				$reqData[AppConstants::REQ_FIELDS[$ky]]=$val;
			}

			if(is_array($list))
			{
				foreach($list as $j=>$val)
				{
					if(in_array($j,array_keys(AppConstants::REQ_FIELDS)))
					{
						if(is_string($j))
						{
							$reqData[AppConstants::REQ_FIELDS[$j]]=$val;
						}
					}
				}
			}
		}
		return $reqData;
	}

	/**
	* return direction based on degree passed
	* @param string val
	* @return string
	*/
	public function getDirection(string $val):string
	{
		$direction ='';

		// if degree is greather than 0 and less than 90 , then east direction
		if($val >0 && $val <=90)
		{
			$direction = AppConstants::DIR_EAST;
		} elseif($val >90 && $val <= 180)
		{
			$direction = AppConstants::DIR_SOUTH;
		} elseif($val > 180 && $val < 270)
		{
			$direction = AppConstants::DIR_WEST;
		} elseif($val > 270 && $val <= 360)
		{
			$direction = AppConstants::DIR_NORTH;
		} 

		return $direction;
	}
}