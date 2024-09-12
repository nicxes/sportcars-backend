<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stock_number',
        'vin',
        'year',
        'make',
        'model',
        'model_code',
        'price',
        'description',
        'photos',
        'tags',
        'days_in_stock',
        'engine',
        'features',
        'body',
        'transmission',
        'series',
        'series_detail',
        'door_count',
        'odometer',
        'engine_cylinder',
        'engine_displacement',
        'drivetrain',
        'color',
        'interior_color',
        'city_mpg',
        'highway_mpg',
        'fuel_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'photos' => 'array',
        'tags' => 'array',
        'features' => 'array',
    ];
}
