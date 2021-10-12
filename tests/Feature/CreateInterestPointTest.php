<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\InterestPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiTestTrait;
use Tests\TestCase;

class CreateInterestPointTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateInterestPoint()
    {
//        $response = $this->post('/api/create');

        $city = City::create([
            'name' => 'Moscow',
            'en_name' => 'Moscow',
            'code' => 'MOS',
        ]);

        $response = $this->json('post', '/api/create',
            [
                'title' => 'test',
                'description' => 'test',
                'city_id' => $city->id,
                'lat' => 11.1111,
                'lon' => 11.1111
            ]);

        $response->assertStatus(200);

    }

    public function testUpdateInterestPoint()
    {
//        $response = $this->put('/api/update');

        $city = City::create([
            'name' => 'Moscow',
            'en_name' => 'Moscow',
            'code' => 'MOS',
        ]);

        $interestPoint = InterestPoint::create([
            'title' => 'test',
            'description' => 'test',
            'city_id' => $city->id,
            'latitude' => 11.1111,
            'longitude' => 11.1111
        ]);

        $response = $this->json('put', '/api/update/'.$interestPoint->id,
            [
                'title' => 'test',
                'description' => 'test',
                'city_id' => City::first()->id,
                'lat' => 11.1111,
                'lon' => 11.1111
            ]);

        $response->assertStatus(200);

    }
}
