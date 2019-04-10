<?php 
namespace App\Factory;
use Symfony\Component\HttpFoundation\JsonResponse;

class SomeOther implements WeatherFactoryInterface
{

	public function getResponse(string $cityName):array
	{
		return ['someother'];
	}

	public function transformResponse(array $data):array
	{
		return $data;
	}
}