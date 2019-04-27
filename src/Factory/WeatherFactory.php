<?php
/** 
 * PHP version 7.2 *
 *
 * Weather Service for getting Weather data in requried format
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */

namespace App\Factory;

use App\Entity\Weather;

/**
 * Weather object factory
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
  
class WeatherFactory
{
    /** 
     * Get weather object
     *
     * @param array  $data   weather data
     * @param string $source source name
     *
     * @return Weather
     */
    public function getWeatherObj(array $data,string $source):Weather
    {
        return new Weather($data, $source);
    }
}
