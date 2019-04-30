<?php 
/** 
 * PHP version 7.2 *
 *
 * Weather Output DTO for Response output
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */
namespace App\DTO;

/**
 * Weather Output format
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherOutput
{
    /**
     * WeatherType 
     *
     * @ORM\Column(type="string")
     */
    public $weatherType;
     /**
      * Temparature
      *
      * @ORM\Column(type="string")
      */
    public $temperature;
     /**
      * Wind
      *
      * @ORM\Column(type="json_array")
      */
    public $wind;

}