<?php

namespace App\Http\Controllers;

use App\Models\InterestPoint;
use App\Services\InterestPointService;
use Illuminate\Http\Request;

class InterestPointController extends Controller
{
    public function nearestPoints(Request $request)
    {
        $ip = $request->ip;
        $radius = $request->radius;

        $points = app(InterestPointService::class)->getNearestPoints($ip, $radius);

        return response()->json($points);
    }

    public function getAllUsersPoints(Request $request)
    {
        $limit = $request->limit;
        $skip = $request->skip;
        $city = $request->city;

        $points = app(InterestPointService::class)->getAllUsersPoints($limit, $skip,$city);

        return response()->json($points);
    }
}
