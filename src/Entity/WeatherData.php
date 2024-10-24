<?php

namespace App\Entity;

use App\Repository\WeatherDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherDataRepository::class)]
class WeatherData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'weatherData')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $measurementDate = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $temperatureC = null;

    #[ORM\Column]
    private ?int $pressure = null;

    #[ORM\Column]
    private ?int $windSpeed = null;

    #[ORM\Column]
    private ?int $rainfall = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getMeasurementDate(): ?\DateTimeInterface
    {
        return $this->measurementDate;
    }

    public function setMeasurementDate(\DateTimeInterface $measurementDate): static
    {
        $this->measurementDate = $measurementDate;

        return $this;
    }

    public function getTemperatureC(): ?string
    {
        return $this->temperatureC;
    }

    public function setTemperatureC(string $temperatureC): static
    {
        $this->temperatureC = $temperatureC;

        return $this;
    }

    public function getPressure(): ?int
    {
        return $this->pressure;
    }

    public function setPressure(int $pressure): static
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getWindSpeed(): ?int
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(int $windSpeed): static
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getRainfall(): ?int
    {
        return $this->rainfall;
    }

    public function setRainfall(int $rainfall): static
    {
        $this->rainfall = $rainfall;

        return $this;
    }
}
