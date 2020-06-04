<?php

namespace App\Controller;

use App\Repository\WeatherRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class WeatherController extends AbstractController
{
	const API_END_POINT = "https://api.openweathermap.org";
	const API_KEY = "XXXXX";

	private $weatherRepository;

    public function __construct(WeatherRepository $weatherRepository, Profiler $profiler)
    {
        $this->weatherRepository = $weatherRepository;
         $profiler->disable();
    }

    /**
     * @Route("/get-all-cities", name="get_all_cities", methods={"GET"})
     */
    public function getAllCities()
    {
        $cities = $this->weatherRepository->findAll();
        $data = [];

        foreach ($cities as $city) {
            $data[] = [
            	'id' => $city->getId(),
                'cityId' => $city->getCityId(),
                'cityName' => $city->getCityName(),
                'cityWeather' => $city->getCityWeather(),
                'countryID' => $city->getCountryID()
            ];
        }

        // the template path is the relative file path from `templates/`
        return $this->render('city/list.html.twig', [
            'cities' => $cities
        ]);
    }

    /**
     * @Route("/weather/city/{id}", name="get_one_city", methods={"GET"})
     */
    public function getCity($id)
    {
        $city = $this->weatherRepository->findOneBy(['cityId' => $id]);
        

        $data = [
            'cityId' => $city->getCityId(),
            'cityName' => $city->getCityName(),
            'cityWeather' => json_decode($city->getCityWeather()),
            'countryID' => $city->getCountryID()
        ];
       
        // the template path is the relative file path from `templates/`
        return $this->render('city/single.html.twig', [
            'city' => $data
        ]);
    }

    /**
     * @Route("/weather/save", name="save", methods={"POST"})
     */
    public function save(Request $request)
    {
    	$id = $request->request->get('city_id');
        $weather = $this->weatherRepository->findOneBy(['cityId' => $id]);
	    
		$client = HttpClient::create();
		$url = self::API_END_POINT."/data/2.5/weather?id=".$id."&appid=".self::API_KEY;
		$response = $client->request('GET', $url);

		$statusCode = $response->getStatusCode();
		$weatherData = $response->getContent();

	    $weather->setCityWeather($weatherData);
	    
	    $updatedWeather = $this->weatherRepository->updateWeather($weather);
	    return $this->redirect("/weather/city/$id");
    }


}
