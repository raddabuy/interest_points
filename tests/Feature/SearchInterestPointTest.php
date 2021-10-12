<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiTestTrait;
use Tests\TestCase;

class SearchInterestPointTest extends TestCase
{
    use RefreshDatabase;

    public function testNearestInterestPoints()
    {
        $response = $this->json('get', '/api/nearest',
            [
                'radius'=> 1
            ]);

        $response->assertStatus(200);

    }

    public function testAllInterestPoints()
    {
        $response = $this->json('get', '/api/all_points',
            [
                'limit'=> 50,
                'skip'=> 0
            ]);


        $response->assertStatus(200);

    }


}
