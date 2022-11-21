<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table = 'Disease';
    public $timestamps = false;
    protected $primaryKey = 'disease_code';

    protected $casts = [
        'disease_code' => 'string'
    ];

    protected $fillable = [
        'disease_code',
        'pathogen',
        'description',
        'id'
    ];

}
