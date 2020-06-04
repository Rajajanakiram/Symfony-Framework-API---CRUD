<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherRepository::class)
 */
class Weather
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $cityId;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $cityName;

    /**
     * @ORM\Column(type="text")
     */
    private $city_weather;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $countryID;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    public function setCityId(int $cityId): self
    {
        $this->cityId = $cityId;

        return $this;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getCityWeather(): ?string
    {
        return $this->city_weather;
    }

    public function setCityWeather(string $city_weather): self
    {
        $this->city_weather = $city_weather;

        return $this;
    }

    public function getCountryID(): ?string
    {
        return $this->countryID;
    }

    public function setCountryID(string $countryID): self
    {
        $this->countryID = $countryID;

        return $this;
    }


    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'cityId' => $this->getCityId(),
            'cityName' => $this->getCityName(),
            'cityWeather' => $this->getCityWeather(),
            'countryID' => $this->getCountryID()
        ];
    }

}
