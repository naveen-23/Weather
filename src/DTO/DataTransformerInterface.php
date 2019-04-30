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
namespace App\DTO;


/**
 * Interface for Data transform from api response
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost
 */
interface DataTransformerInterface
{
    
    /**
     * Transform Response to object
     *
     * @param mixed  $data    data 
     * @param string $to      type 
     * @param array  $context context 
     *
     * @return mixed
     */
    public function transform($data,string $to,array $context = []);
}