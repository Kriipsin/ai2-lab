<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\WeatherDataRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class WeatherController extends AbstractController
{
    #[Route('/weather/{city}/{country}', name: 'app_weather',requirements: ['id' => '\d+'])]
    public function city(#[MapEntity(mapping: ["country" => "country", "city" => "city"])]
                         Location $location, WeatherDataRepository $repository): Response
    {
        $weatherData = $repository->findByLocation($location);
        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'weatherData' => $weatherData,
        ]);
    }
}
