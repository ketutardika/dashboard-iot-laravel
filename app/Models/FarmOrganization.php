<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmOrganization extends Model
{
    use HasFactory;
    protected $table = 'farm_organizations';
    protected $fillable = ['unique_id', 'name_organization', 'description_farm', 'user_id'];

    public function projects()
    {
        return $this->hasMany(Projects::class, 'unique_id_farm', 'unique_id');
    }

}
