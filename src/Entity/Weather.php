<?php
/**
 * Entity for weather data
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

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Constants\AppConstants;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * Weather class   
 *
 * @ORM\Entity(repositoryClass="App\Repository\WeatherRepository")
 *
 * @category Weather
 * @package  Open_Weather
 * @author   Test <testemail@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  Release: <0.1>
 * @link     http://localhost
 */
class Weather
{
    /**
     * AUTO increment id
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $_id;

    /**
     * Response 
     *
     * @ORM\Column(type="json_array")
     */
    private $_response;

    /**
     * Source of weather
     *
     * @ORM\Column(type="string", length=255)
     */
    private $_source;

    /**
     * Representation data
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"admins"})
     */
    private $_representationData;


    /**
     * Created time
     *
     * @ORM\Column(type="datetime")
     */
    private $_createdAt;

    /**
     * Updated time
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $_updatedAt;

    /** 
     * Get weather object
     *
     * @param array  $data   weather data
     * @param string $source source name
     */
    public function __construct(array $data,string $source)
    {
        $this->_response = $data; //json_encode($data,true);
        $this->_source = $source;
    }
    /** 
     * Get id of the object
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->_id;
    }
    /** 
     * Get weather response
     *
     * @return json
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /** 
     * Set the response for the object
     *
     * @param json $response response object
     *
     * @return self
     */
    public function setResponse($response): self
    {
        $this->_response = $response;

        return $this;
    }

    /** 
     * Get source
     *
     * @return string
     */
    public function getSource(): ?string
    {
        return $this->_source;
    }

    /** 
     * Set source
     *
     * @param string $source source
     *
     * @return Self
     */
    public function setSource(string $source): self
    {
        $this->_source = $source;

        return $this;
    }

    /** 
     * Get created time 
     *
     * @return datetime|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->_createdAt;
    }

    /** 
     * Set created time 
     *
     * @param datetime $createdAt created time
     *
     * @return self
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->_createdAt = $createdAt;

        return $this;
    }
    /**
     * Get updated time 
     *
     * @return datetime
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->_updatedAt;
    }

    /** 
     * Set updated time 
     *
     * @param datetime $updatedAt updated time
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->_updatedAt = $updatedAt;

        return $this;
    }

    

    /**
     * Return representation data 
     *
     * @return string 
     */
    public function getRepresentationData():?array
    {
        return $this->_representationData;
    }
    /**
     * Set representation data 
     *
     * @param json $representationData representationData object
     *
     * @return null
     */
    public function setRepresentationData($representationData):void
    {
        $this->_representationData = $representationData;
    }
}
