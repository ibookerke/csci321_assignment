<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    const DefaultValue = '-';

    protected $table = 'Country';
    protected $primaryKey = 'cname';

    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'cname',
        'population'
    ];

    protected $casts = [
        'cname' => 'string',
    ];

}
