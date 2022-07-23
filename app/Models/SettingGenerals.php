<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingGenerals extends Model
{
    use HasFactory;
    public $table = "setting_generals";    
    protected $fillable = ['general_unique_id', 'title', 'tagline', 'description', 'email', 'phone', 'theme', 'logo', 'favicon', 'language', 'timezone', 'date_format', 'time_format', 'user_id'];
}
