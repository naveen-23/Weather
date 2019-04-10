<?php 
namespace App\Factory;

interface WeatherFactoryInterface
{

	public function getResponse(string $cityName):array;
	public function transformResponse(array $data):array;
}