<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExControl extends Model
{
    use HasFactory;
    protected $table = 'ex_controls';
    protected $fillable = ['name', 'value'];
}
