<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorsConfig extends Model
{	
    protected $table = 'sensors_config';
    use HasFactory;
    protected $fillable = [
        'sensor_unique_id'

    ];
    public function sensor()
    {
        return $this->belongsTo(Sensors::class, 'sensor_unique_id', 'unique_id');
    }
}
