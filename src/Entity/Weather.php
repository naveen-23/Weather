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
     * Coordinates
     *
     * @ORM\Column(type="json_array")
     */
    private $_coord;
    /**
     * Weather
     *
     * @ORM\Column(type="json_array")
     */
    private $_weather;
    /**
     * Base
     *
     * @ORM\Column(type="json_array")
     */
    private $_base;
    /**
     * Main
     *
     * @ORM\Column(type="json_array")
     */
    private $_main;
    /**
     * Visibility
     *
     * @ORM\Column(type="json_array")
     */
    private $_visibility;
    /**
     * Wind
     *
     * @ORM\Column(type="json_array")
     */
    private $_wind;
    /**
     * Clouds
     *
     * @ORM\Column(type="json_array")
     */
    private $_clouds;
    /**
     * Dt
     *
     * @ORM\Column(type="json_array")
     */
    private $_dt;
    /**
     * Sys
     *
     * @ORM\Column(type="json_array")
     */
    private $_sys;
    
    /**
     * Name
     *
     * @ORM\Column(type="json_array")
     */
    private $_name;
    /**
     * Cod
     *
     * @ORM\Column(type="json_array")
     */
    private $_cod;


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

    /**
     * Get Coordinates 
     *
     * @return mixed
     */
    public function getCoord()
    {
        return $this->_coord;
    }

    /**
     * Set Coordinates 
     *
     * @param mixed $_coord coord
     *
     * @return self
     */
    public function setCoord($_coord)
    {
        $this->_coord = $_coord;

        return $this;
    }

    /**
     * Get Weather
     *
     * @return mixed
     */
    public function getWeather()
    {
        return $this->_weather;
    }

    /**
     * Set Weather
     *
     * @param mixed $_weather weather
     *
     * @return self
     */
    public function setWeather($_weather)
    {
        $this->_weather = $_weather;

        return $this;
    }

    /**
     * Get Base
     *
     * @return mixed
     */
    public function getBase()
    {
        return $this->_base;
    }

    /**
     * Set Base
     *
     * @param mixed $_base base
     *
     * @return self
     */
    public function setBase($_base)
    {
        $this->_base = $_base;

        return $this;
    }

    /**
     * Get Main
     *
     * @return mixed
     */
    public function getMain()
    {
        return $this->_main;
    }

    /**
     * Set Main
     *
     * @param mixed $_main main
     *
     * @return self
     */
    public function setMain($_main)
    {
        $this->_main = $_main;

        return $this;
    }

    /**
     * Get Visibility
     *
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->_visibility;
    }

    /**
     * Set Visibility
     *
     * @param mixed $_visibility visibility
     *
     * @return self
     */
    public function setVisibility($_visibility)
    {
        $this->_visibility = $_visibility;

        return $this;
    }

    /**
     * Get Wind
     *
     * @return mixed
     */
    public function getWind()
    {
        return $this->_wind;
    }

    /**
     * Set Wind
     *
     * @param mixed $_wind wind
     *
     * @return self
     */
    public function setWind($_wind)
    {
        $this->_wind = $_wind;

        return $this;
    }

    /**
     * Get Clouds
     *
     * @return mixed
     */
    public function getClouds()
    {
        return $this->_clouds;
    }

    /**
     * Set Clouds
     *
     * @param mixed $_clouds clouds 
     *
     * @return self
     */
    public function setClouds($_clouds)
    {
        $this->_clouds = $_clouds;

        return $this;
    }

    /**
     * Get Dt
     *
     * @return mixed
     */
    public function getDt()
    {
        return $this->_dt;
    }

    /**
     * Set Dt
     *
     * @param mixed $_dt dt
     *
     * @return self
     */
    public function setDt($_dt)
    {
        $this->_dt = $_dt;

        return $this;
    }

    /**
     * Get Sys
     *
     * @return mixed
     */
    public function getSys()
    {
        return $this->_sys;
    }

    /**
     * Set sys
     *
     * @param mixed $_sys sys
     *
     * @return self
     */
    public function setSys($_sys)
    {
        $this->_sys = $_sys;

        return $this;
    }

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set Name
     *
     * @param mixed $_name name 
     *
     * @return self
     */
    public function setName($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get Cod
     *
     * @return mixed
     */
    public function getCod()
    {
        return $this->_cod;
    }

    /**
     * Set Cod
     *
     * @param mixed $_cod cod
     *
     * @return self
     */
    public function setCod($_cod)
    {
        $this->_cod = $_cod;

        return $this;
    }


}
