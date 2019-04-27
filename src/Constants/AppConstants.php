<?php
/**
 * Constants for the App
 *
 * PHP version 7.2 *
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: 0.1
 * @link     http://localhost
 */

namespace App\Constants;

/**
 *   Define constants for the application
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
class AppConstants
{
    const SOMETHING_WRONG =1000;


    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';

    public static $errorCodes =[self::SOMETHING_WRONG=>'Something went wrong '];

    const REQ_FIELDS = ['weather'=>'weather_type',
                        'temp'=>'temparature',
                        'wind'=>'wind'];
    
    const CONVERT_FIELDS = 'weather';

    const FORMAT_FIELD_MAIN = 'wind';
    const FORMAT_FIELDS = 'deg';

    const DIR_EAST = 'East';
    const DIR_WEST = 'West';
    const DIR_NORTH = 'North';
    const DIR_SOUTH = 'South';
}