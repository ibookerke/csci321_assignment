<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'record';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'email',
        'cname',
        'disease_code',
        'total_deaths',
        'total_patients'
    ];

    protected $casts = [
        'email' => 'string',
        'cname' => 'string',
        'disease_code' => 'string',
        'total_deaths' => 'int',
        'total_patients' => 'int'
    ];

}
