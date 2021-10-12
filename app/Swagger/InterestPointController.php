<?php

namespace App\Http\Swagger;

abstract class InterestPointController
{
    /**
     * @OA\Post(
     *     path="/create",
     *     summary="Create new interest point",
     *     tags={"Interest point"},
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Interest point title",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Interest point description",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="city_id",
     *         in="query",
     *         description="City id",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="latitude",
     *         in="query",
     *         description="Interest point latitude",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="longitude",
     *         in="query",
     *         description="Interest point longitude",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Schema(
     *             type="array"
     *         ),
     *     )
     * )
     */

    abstract public function create();

    /**
     * @OA\Post(
     *     path="/update/{id}",
     *     summary="Update interest point",
     *     tags={"Interest point"},
     *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Interest point title",
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="Interest point description",
     *     ),
     *     @OA\Parameter(
     *         name="city_id",
     *         in="query",
     *         description="City id",
     *     ),
     *     @OA\Parameter(
     *         name="latitude",
     *         in="query",
     *         description="Interest point latitude",
     *     ),
     *     @OA\Parameter(
     *         name="longitude",
     *         in="query",
     *         description="Interest point longitude",
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Interest point id",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Schema(
     *             type="array"
     *         ),
     *     )
     * )
     */

    abstract public function update();

    /**
     * @OA\Get(
     *     path="/nearest",
     *     summary="Get all interest points in given area of user's location",
     *     tags={"Interest point"},
     *     @OA\Parameter(
     *         name="radius",
     *         in="query",
     *         description="Area radius",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="ip",
     *         in="query",
     *         description="User's IP",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Schema(
     *             type="array"
     *         ),
     *     )
     * )
     */
    abstract public function nearestPoints();

    /**
     * @OA\Get(
     *     path="/all_points",
     *     summary="Get all interest points in user's location city",
     *     tags={"Interest point"},
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="query limit",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="skip",
     *         in="query",
     *         description="query skip",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="city",
     *         in="query",
     *         description="city (in english, Moscow, Perm or Yekaterinburg)",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Schema(
     *             type="array"
     *         ),
     *     )
     * )
     */
    abstract public function getAllUsersPoints();

}
