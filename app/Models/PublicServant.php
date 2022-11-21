<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicServant extends Model
{
    use HasFactory;

    protected $table = 'publicservant';

    protected $primaryKey = 'email';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'department'
    ];

    protected $casts = [
        'email' => 'string',
    ];
}
