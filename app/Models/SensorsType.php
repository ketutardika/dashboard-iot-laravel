<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorsType extends Model
{	
    use HasFactory;
    public $table = "sensors_type";
    protected $fillable = [
        'sensor_type_name', 'sensor_type_code','sensor_type_measurement','sensor_type_measurement_code','sensor_type_description'

    ];
}