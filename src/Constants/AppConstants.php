<?php 
namespace App\Constants;

class AppConstants 
{

	CONST SOMETHING_WRONG =1000;


	CONST STATUS_FAILED = 'failed';
	CONST STATUS_SUCCESS = 'success';

	public static $errorCodes =
		[self::SOMETHING_WRONG=>'Something went wrong '];

	const REQ_FIELDS = ['weather'=>'weather_type','temp'=>'temparature','wind'=>'wind'];
	
	const CONVERT_FIELDS = 'weather';	

	CONST FORMAT_FIELD_MAIN = 'wind';
	CONST FORMAT_FIELDS = 'deg';

	CONST DIR_EAST = 'East';
	CONST DIR_WEST = 'West';
	CONST DIR_North = 'North';
	CONST DIR_SOUTH = 'South';
}