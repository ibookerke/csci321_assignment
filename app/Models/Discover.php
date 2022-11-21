<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discover extends Model
{
    use HasFactory;

    protected $table = 'discover';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $casts = [
        'cname' => 'string',
        'disease_code' => 'string',
        'first_enc_date' => 'date'
    ];

    protected $fillable = [
        'disease_code',
        'cname',
        'first_enc_date',
    ];
}
