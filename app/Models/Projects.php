<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
	use HasFactory;
	public $table = "projects";    
    protected $fillable = ['unique_id', 'unique_id_farm', 'name_project', 'type_project', 'description_project', 'user_id','isactive'];

    public function farmorganization()
    {
        return $this->belongsTo(FarmOrganization::class, 'unique_id_farm', 'unique_id');
    }

    public function projectssections()
    {
        return $this->hasMany(ProjectsSections::class, 'unique_id_project', 'unique_id');
    }
}
