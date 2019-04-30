<?php
/** 
 * PHP version 7.2 *
 *
 * Weather Output Transformer
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */ 
namespace App\DTO;
use App\DTO\DataTransformerInterface;
use App\Constants\AppConstants;

/**
 * DTO for Transforming APi response to Weather Output object
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherOutputTransform implements DataTransformerInterface
{

    /**
     * Transform data to output object
     *
     * @param mixed  $data    data 
     * @param string $to      type 
     * @param array  $context context 
     *
     * @return WeatherOutput $output 
     */
    public function transform($data, string $to, array $context = [])
    {
        $output = new WeatherOutput();
        $output->weatherType = $data->getWeather()[0]['main'];
        $output->temperature = $data->getMain()['temp'];
        $output->wind  = $data->getWind();
        $output->wind['degree'] = $this->getDirection($data->getWind()['deg']);
        unset($output->wind['deg']);

        return $output;
    }

    /**
     * Return direction based on degree passed
     *
     * @param string $degree degree
     *
     * @return string
     */
    public function getDirection(string $degree):string
    {
        $direction ='';

        // if degree is greather than 0 and less than 90 , then east direction
        if ($degree >0 && $degree <=90) {
            $direction = AppConstants::DIR_EAST;
        } elseif ($degree >90 && $degree <= 180) {
            $direction = AppConstants::DIR_SOUTH;
        } elseif ($degree > 180 && $degree < 270) {
            $direction = AppConstants::DIR_WEST;
        } elseif ($degree > 270 && $degree <= 360) {
            $direction = AppConstants::DIR_NORTH;
        }

        return $direction;
    }

}