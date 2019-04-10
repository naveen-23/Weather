<?php 
namespace App\Constants;


class WeatherConstants 
{
	CONST CURRENT_PROVIDER = "OPEN_WEATHER";

	CONST OPEN_WEATHER  =1;
	CONST SOMEOTHER_WEATHER =2 ;

	public static $weatherProviders = [self::OPEN_WEATHER => "Open weather",
										self::SOMEOTHER_WEATHER => "Some other "];

}