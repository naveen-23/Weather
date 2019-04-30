<?php 
/** 
 * PHP version 7.2 *
 *
 * Weather DTO for converting API response to Weather Object
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <0.1>
 * @link     http://localhost
 */
namespace App\DTO;

use App\Entity\Weather;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\DTO\DataTransformerInterface;


/**
 * DTO for Transforming APi response to Weather object
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */

class WeatherDTO implements DataTransformerInterface
{

    /**
     * Transform data to weather object
     *
     * @param mixed  $data    data 
     * @param string $to      type 
     * @param array  $context context 
     *
     * @return mixed
     */
    public function transform($data, string $to, array $context = [])
    {
        $weather = new Weather();

        $encoders = [ new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $weather = $serializer->deserialize($data, Weather::class, 'json');
       
        return $weather;
    }

}