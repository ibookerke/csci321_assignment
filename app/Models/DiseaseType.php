<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    use HasFactory;

    protected $table = 'DiseaseType';

    public $timestamps = false;

    protected $fillable = [
        'description'
    ];
}
