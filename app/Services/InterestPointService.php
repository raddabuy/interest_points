<?php
namespace App\Services;

use App\Constants\DefaultCity;
use App\Exceptions\CityNotFoundException;
use App\Models\City;
use App\Models\InterestPoint;
use App\Models\IP;
use App\Transformers\APIFractalManager;
use App\Transformers\InterestPointsTransformer;

class InterestPointService
{
    private $fractal;
    private $interestPointsTransformer;


    public function __construct(
        APIFractalManager $fractal,
        InterestPointsTransformer $interestPointsTransformer
    )
    {
        $this->interestPointsTransformer = $interestPointsTransformer;
        $this->fractal = $fractal;
    }

    public function getNearestPoints($ip, $radius)//ip, radius
    {
        $userLocation = $this->getLocation($ip);

        $lat = $userLocation['lat'];
        $lon = $userLocation['lon'];

        $points = InterestPoint::whereHas('city', function ($query) use($userLocation) {
            return $query->where('en_name', $userLocation['city']);
        })
            ->whereRaw("abs($lon-longitude)/abs($lat-latitude) <= $radius")
            ->get();



        $resource = $this->fractal->collection($points, $this->interestPointsTransformer);

        return $resource;
    }


    public function getAllUsersPoints($limit, $skip, $city)//limit,skip,
    {
        $query = InterestPoint::query();
        if(is_null($city))
            $city = 'Moscow';

        $query->whereHas('city', function ($query) use($city) {
                        return $query->where('en_name', $city);
                });

        if(!is_null($limit))
            $query->limit($limit);

        if(!is_null($skip))
            $query->skip($skip);

        $points = $query->get();


        $resource = $this->fractal->collection($points, $this->interestPointsTransformer);

        return $resource;

    }
    private function getLocation($ip)
    {
        if($ip)
        {
            if($existingIp = IP::where('ip',$ip)->first())
            {
                $city = $existingIp->city->en_name;
                $lat = $existingIp->latitude;
                $lon = $existingIp->longitude;
            }
            else
            {
                $location = geoip()->getLocation($ip);

                $city = $location->city;
                $lat = $location->lat;
                $lon = $location->lon;

                if(!City::where('en_name',$location->city)->first())
                    throw new CityNotFoundException();

                IP::create([
                    'ip' => $ip,
                    'city_id' => City::where('en_name',$location->city)->first()->id,
                    'latitude' => number_format($location->lat,4),
                    'longitude' => number_format($location->lon,4)
                ]);
            }

        }
        else
        {
            $city = DefaultCity::DEFAULT_CITY;
            $lat = DefaultCity::DEFAULT_CITY_LAT;
            $lon = DefaultCity::DEFAULT_CITY_LON;
        }

        return [
            'city' => $city,
            'lat' => number_format($lat,4),
            'lon' => number_format($lon,4)
        ];
    }

}
