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

/**
 * @Route("/api/v{no}")
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
     * @Route("/get-weather/{cityName}", 
                name="get_weather", methods={"GET"})
     *  Get weather information based on city name
     */
    public function getWeatherAction(Request $request, string $cityName, 
        WeatherService $weatherService
    ) : JsonResponse {

        $data = $weatherService->getWeatherData($cityName);

        return $this->json($data);
    }

}