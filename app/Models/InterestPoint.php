<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestPoint extends Model
{
    use HasFactory;

    protected $table = 'interest_points';
    public $timestamps = false;

    protected $fillable = ['title', 'description', 'latitude', 'longitude','city_id'];
}
