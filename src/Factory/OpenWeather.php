<?php
/** 
 * PHP version 7.2 *
 *
 * Component for Weather provider
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */

namespace App\Factory;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use App\Constants\AppConstants;
use App\Factory\WeatherFactory;
use App\Entity\Weather;


/**
 * Open weather provider 
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class OpenWeather implements WeatherProviderFactoryInterface
{
    private $_baseUrl;
    private $_apiKey;

    CONST SOURCE_NAME = 'Open Weather';

    /**
     * Set base url
     *
     * @param string $baseUrl base url
     *
     * @return null
     */
    public function setBaseUrl($baseUrl):void
    {
        $this->_baseUrl = $baseUrl;
    }

    /**
     * Set Api key
     *
     * @param string $apiKey base url
     *
     * @return null
     */
    public function setApiKey($apiKey):void
    {
        $this->_apiKey = $apiKey;
    }

    /**
     *  Gets the Response from the API
     *
     * @param string $cityName city name
     *
     * @return weather|null
     */
    public function getResponseObj(string $cityName):?Weather
    {
        try {
            $param = $this->getParams($cityName);
            $client = new \GuzzleHttp\Client(['base_uri' => $this->_baseUrl]);

            $returnData = [];
            $response = $client->request('GET', $param);

            if ($response->getStatusCode() == Response::HTTP_OK) {
                $data = json_decode($response->getBody(), true);

                $weatherFactory = new WeatherFactory();
                $weatherObj = $weatherFactory->getWeatherObj($data, SELF::SOURCE_NAME);

                return $weatherObj;
            }
        } catch (\Exception $ex) {
            throw new \Exception('Response fetch failed'.$ex->getMessage());
        }

        return null;
    }

    /**
     * Transform the response to user required format
     *
     * @param array $weather weather model
     *
     * @return null
     */
    public function transformResponse(Weather $weather):void
    {
        $this->applyTransformation($weather);
    }

    /**
     *  Makes the Params list for fetching the api response
     *
     * @param String $cityName city name 
     *
     * @return string
     */
    public function getParams(string $cityName):string
    {
        $param = '?q='.$cityName.'&appid='.$this->_apiKey;

        return $param;
    }

    /**
     *    Loop through the json response and fetch only required fields
     * @param Weather $weather weather object
     *
     * @return null
     */
    public function applyTransformation($weather):void
    {
        $representationData = [] ;

        // Loop through the json and fetch only the required fields
        foreach ($weather->getResponse() as $ky =>$list) {
            if (in_array($ky, array_keys(AppConstants::REQ_FIELDS))) {
                $val = $list;
                
                if ($ky == AppConstants::CONVERT_FIELDS) {
                    // use only main for field
                    $val = $list[0]['main'];
                }
                if ($ky == AppConstants::FORMAT_FIELD_MAIN) {
                    $val[AppConstants::FORMAT_FIELDS] = $this->getDirection($val[AppConstants::FORMAT_FIELDS]);
                }
                $representationData[AppConstants::REQ_FIELDS[$ky]]=$val;
            }

            if (is_array($list)) {
                foreach ($list as $j=>$val) {
                    if (in_array($j, array_keys(AppConstants::REQ_FIELDS))) {
                        if (is_string($j)) {
                            $representationData[AppConstants::REQ_FIELDS[$j]]=$val;
                        }
                    }
                }
            }
        }

        $weather->setRepresentationData($representationData);
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
