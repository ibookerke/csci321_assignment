<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctor';

    protected $primaryKey = 'email';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'degree'
    ];

    protected $casts = [
        'email' => 'string',
    ];
}
