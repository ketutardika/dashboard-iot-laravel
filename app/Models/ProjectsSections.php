<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sensors;

class ProjectsSections extends Model
{
    use HasFactory;
    public $table = "projects_sections";    
    protected $fillable = ['unique_id', 'unique_id_project', 'name_section', 'type_section', 'description_section', 'user_id'];

    public function projects()
    {
        return $this->belongsTo(Projects::class, 'unique_id_project', 'unique_id');
    }
    public function sectionssensor()
    {
        return $this->hasMany(Sensors::class, 'unique_id_section', 'unique_id');
    }
}
