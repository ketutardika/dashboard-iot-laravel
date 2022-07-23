<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectsSections;

class Sensors extends Model
{
    use HasFactory;
    public $table = "sensors_device";
    protected $fillable = [
        'unique_id', 'name_sensor', 'api_key','id_user', 'id_sensor_type','unique_id_section'
    ];
    public function sections()
    {
        return $this->belongsTo(ProjectsSections::class, 'unique_id', 'unique_id_section');
    }
    public function sensorconfig()
    {
        return $this->hasOne(SensorsConfig::class, 'sensor_unique_id', 'unique_id');
    }
}
