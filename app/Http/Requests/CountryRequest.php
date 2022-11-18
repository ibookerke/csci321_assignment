<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @property string $cname
 * @property int $population
 */

class CountryRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'cname' => ['required', 'string', 'max:50'],
            'population' => ['required', 'int']
        ];
    }
}
