<?php

namespace Database\Seeders;

use App\Models\InterestPoint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const INTEREST_POINTS = [
        [
            'title' => 'Галерея',
            'description' => 'Пермская художественная галерея',
            'latitude' => 58.0162,
            'longitude' => 56.2344,
            'city_id' => 2
        ],
        [
            'title' => 'Оперный театр',
            'description' => 'Пермский театр оперы и балета',
            'latitude' => 58.0160,
            'longitude' => 56.2457,
            'city_id' => 2
        ],
        [
            'title' => 'Эспланада',
            'description' => 'Пермская городская эспланада',
            'latitude' => 58.0104,
            'longitude' => 56.2277,
            'city_id' => 2
        ],
        [
            'title' => 'Счастье не за горами',
            'description' => 'Пермский арт-объект Счастье не за горами',
            'latitude' => 58.0211,
            'longitude' => 56.2506,
            'city_id' => 2
        ], [
            'title' => 'Храм на крови',
            'description' => 'Храм на крови, город Екатеринбург',
            'latitude' => 56.8444,
            'longitude' => 60.6088,
            'city_id' => 3
        ],
        [
            'title' => 'Высоцкий',
            'description' => 'Бизнес-центр Высоцкий, город Екатеринбург',
            'latitude' => 56.8361,
            'longitude' => 60.6145,
            'city_id' => 3
        ],
        [
            'title' => 'Оперный театр',
            'description' => 'Оперный театр, город Екатеринбург',
            'latitude' => 56.8394,
            'longitude' => 60.6164,
            'city_id' => 3
        ],
        [
            'title' => 'Каменные палатки',
            'description' => 'Каменные палатки, город Екатеринбург',
            'latitude' => 56.8434,
            'longitude' => 60.6786,
            'city_id' => 3
        ],
        [
            'title' => 'Кремль',
            'description' => 'Кремль, Москва',
            'latitude' => 55.7518,
            'longitude' => 37.6183,
            'city_id' => 1
        ],
        [
            'title' => 'Третьяковская галерея',
            'description' => 'Государственная Третьяковская галерея, Москва',
            'latitude' => 55.7418,
            'longitude' => 37.6206,
            'city_id' => 1
        ],
        [
            'title' => 'Музей космонавтики',
            'description' => 'Московский музей космонавтики на ВДНХ',
            'latitude' => 55.8232,
            'longitude' => 37.6398,
            'city_id' => 1
        ],
        [
            'title' => 'Арбат',
            'description' => 'Пешеходная улица Арбат, город Москва',
            'latitude' => 55.7495,
            'longitude' => 37.5912,
            'city_id' => 1
        ],
        [
            'title' => 'Автомузей',
            'description' => 'Московский автомузей',
            'latitude' => 55.7553,
            'longitude' => 37.6752,
            'city_id' => 1
        ],
        [
            'title' => 'Музей эмоций',
            'description' => 'Музей эмоций, город Москва',
            'latitude' => 55.7591,
            'longitude' => 37.6646,
            'city_id' => 1
        ],
        [
            'title' => 'Парк Горького',
            'description' => 'Городской парк Горького, город Москва',
            'latitude' => 55.7298,
            'longitude' => 37.6011,
            'city_id' => 1
        ],
        [
            'title' => 'Новодевичье кладбище',
            'description' => 'Новодевичье кладбище знаменитых людей, город Москва',
            'latitude' => 55.7256,
            'longitude' => 37.5541,
            'city_id' => 1
        ],
    ];

    public function run()
    {
        DB::table('interest_points')->insert(self::INTEREST_POINTS);
    }
}
