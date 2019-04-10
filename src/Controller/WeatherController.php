<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\WeatherService;

class WeatherController extends AbstractController
{

	/** @Route("/api/v{no}/get-weather/{cityName}", name="get_weather", methods={"GET"})
	* @return Symfony\Component\HttpFoundation\JsonResponse
	*/
	public function getWeatherAction(Request $request,string $cityName,WeatherService $weatherService) : JsonResponse
	{
		$cityName = $this->validateRequestData($cityName);

		$data = $weatherService->getWeatherData($cityName);	

		if(isset($data['error']))
		{
			$response = ['status'=>'failed','msg'=>'Something went wrong'];

			return $this->json($response);
		}
		
		return $this->json($data);
	}

	private function validateRequestData(string $cityName) :string 
	{
		$cityName = filter_var($cityName, FILTER_SANITIZE_STRING);

		return $cityName;	
	}

}
