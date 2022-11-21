<?php

namespace App\Http\Requests;

use App\Models\Country;
use App\Models\Disease;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $cname
 * @property string $disease_code
 * @property string first_enc_date
 */

class DiscoverRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cname' => ['required', 'string', Rule::exists((new Country())->getTable(), 'cname')],
            'disease_code' => ['required', 'string', Rule::exists((new Disease())->getTable(), 'disease_code')],
            'first_enc_date' => ['required', 'date']
        ];
    }
}
