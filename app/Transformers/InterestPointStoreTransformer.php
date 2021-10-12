<?php

namespace App\Transformers;

use App\Models\InterestPoint;
use League\Fractal\TransformerAbstract;


class InterestPointStoreTransformer extends TransformerAbstract
{
    /**
     * Transform the Currency entity.
     *
     * @param InterestPoint $interestPoints
     *
     * @return array
     */
    public function transform(InterestPoint $interestPoints)
    {
        $response = [
            'id' => $interestPoints->id,
            'title' => $interestPoints->title,
            'description' => $interestPoints->description,
            'city' => $interestPoints->city->name,
            'latitude' => number_format($interestPoints->latitude, 4),
            'longitude' => number_format($interestPoints->longitude,4)
        ];

        return $response;
    }
}
