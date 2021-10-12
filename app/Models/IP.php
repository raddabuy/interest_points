<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    use HasFactory;

    protected $table = 'ip';

    public $timestamps = false;

    protected $fillable = ['ip', 'city_id','latitude', 'longitude'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
