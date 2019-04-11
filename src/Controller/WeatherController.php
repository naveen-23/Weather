<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\WeatherService;
use App\Constants\AppConstants;

class WeatherController extends AbstractController
{

	/** @Route("/api/v{no}/get-weather/{cityName}", name="get_weather", methods={"GET"})
	*  @param string cityName 
	*  @param Request request
	*  @param WeatherService weatherService
	* @return Symfony\Component\HttpFoundation\JsonResponse
	*/
	public function getWeatherAction(Request $request,string $cityName,WeatherService $weatherService) : JsonResponse
	{
		$cityName = $this->validateRequestData($cityName);

		try 
		{
			$data = $weatherService->getWeatherData($cityName);		
		} catch(\Exception $ex)
		{
			$response = ['status'=>AppConstants::STATUS_FAILED, 
						 'statusCode'=>AppConstants::SOMETHING_WRONG,
						 'msg'=>AppConstants::$errorCodes[AppConstants::SOMETHING_WRONG]];

			return $this->json($response);
		}
		
		return $this->json($data);
	}

	/**
	*  @param string cityName 
	*/
	private function validateRequestData(string $cityName) :string 
	{
		$cityName = filter_var($cityName, FILTER_SANITIZE_STRING);

		return $cityName;	
	}

}
