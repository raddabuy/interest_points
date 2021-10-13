<?php

namespace App\Http\Controllers;

use App\Exceptions\PointNotFoundException;
use App\Http\Requests\AllPointsRequest;
use App\Http\Requests\CreateInterestPointRequest;
use App\Http\Requests\NearestPointsRequest;
use App\Http\Requests\UpdateInterestPointRequest;
use App\Models\InterestPoint;
use App\Services\InterestPointService;
use App\Transformers\APIFractalManager;
use App\Transformers\InterestPointStoreTransformer;
use Illuminate\Http\Request;

class InterestPointController extends Controller
{
    private $fractal;
    private $interestPointsTransformer;


    public function __construct(
        APIFractalManager $fractal,
        InterestPointStoreTransformer $interestPointStoreTransformer
    )
    {
        $this->interestPointStoreTransformer = $interestPointStoreTransformer;
        $this->fractal = $fractal;
    }

    /**
     * Get all interest points in given area of user's location
     * @see \App\Http\Swagger\InterestPointController::nearestPoints()
     * @param Request $request (ip and radius)
     * @return \Illuminate\Http\JsonResponse
     */

    public function nearestPoints(NearestPointsRequest $request)
    {
        $ip = $request->get('ip');
        $radius = $request->get('radius');

        $points = app(InterestPointService::class)->getNearestPoints($ip, $radius);

        return response()->json($points);
    }

    /**
     * Get all interest points in user's location city
     * @see \App\Http\Swagger\InterestPointController::getAllUsersPoints()
     * @param Request $request (limit, skip, city)
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsersPoints(AllPointsRequest $request)
    {
        $limit = $request->get('limit');
        $skip = $request->get('skip');
        $city = $request->get('city');

        $points = app(InterestPointService::class)->getAllUsersPoints($limit, $skip,$city);

        return response()->json($points);
    }

    /**
     * Create new interest point
     * @see \App\Http\Swagger\InterestPointController::create()
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateInterestPointRequest $request)
    {
        $point = InterestPoint::create([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $request->lat,
            'longitude' => $request->lon,
            'city_id' => $request->city_id
        ]);
        $resource = $this->fractal->item($point, $this->interestPointStoreTransformer);

        return response()->json($resource);
    }

    /**
     * Update interest point by id
     * @see \App\Http\Swagger\InterestPointController::update()
     * @param Request $request (limit, skip, city)
     * @return \Illuminate\Http\JsonResponse
     */

    public function update($id, UpdateInterestPointRequest $request)
    {
        $point = InterestPoint::find($id);

        if(!$point)
            throw new PointNotFoundException();

        $point->update([
            'title' => $request->title,
            'description' => $request->description,
            'latitude' => $request->lat,
            'longitude' => $request->lon,
            'city_id' => $request->city_id
        ]);

        $resource = $this->fractal->item($point, $this->interestPointStoreTransformer);

        return response()->json($resource);
    }


}
