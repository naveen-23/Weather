<?php
/**
 * Controller for weather data
 *
 * PHP version 7.2 *
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\WeatherService;
use App\Constants\AppConstants;

/**
 *   Api Defined for getting weather data
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherController extends AbstractController
{

    /**
     * Api for getting weather information
     *
     * @param Request        $request        request
     * @param string         $cityName       city name     
     * @param WeatherService $weatherService service class
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Route("/api/v{no}/get-weather/{cityName}", 
                name="get_weather", methods={"GET"})
     *  Get weather information based on city name
     */
    public function getWeatherAction(Request $request, string $cityName, 
        WeatherService $weatherService
    ) : JsonResponse {
        $cityName = $this->_validateRequestData($cityName);

        $data = $weatherService->getWeatherData($cityName);

        return $this->json($data);
    }

    /**
     * Validate the city name passed
     *
     * @param string $cityName name of city
     *
     * @return string 
     */
    private function _validateRequestData(string $cityName) :string
    {
        $cityName = filter_var($cityName, FILTER_SANITIZE_STRING);

        return $cityName;
    }
}