<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorsDataLog extends Model
{
    use HasFactory;
    public $table = "sensors_datalog";
    protected $fillable = [
        'unique_id', 'data_reading','data_measurement'
    ];
}
