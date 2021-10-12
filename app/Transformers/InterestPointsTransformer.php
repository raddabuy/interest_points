<?php

namespace App\Transformers;

use App\Models\InterestPoint;
use League\Fractal\TransformerAbstract;


class InterestPointsTransformer extends TransformerAbstract
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
            'title' => $interestPoints->title,
            'description' => $interestPoints->description,
            'city' => $interestPoints->city->name
        ];

        return $response;
    }
}
