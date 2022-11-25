<?php

namespace App\Http\Requests;

use App\Models\Country;
use App\Models\Disease;
use App\Models\PublicServant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $email
 * @property string $cname
 * @property string $disease_code
 * @property int $total_deaths
 * @property int $total_patients
 */

class RecordRequest extends FormRequest
{
    public function rules() : array
    {
        return [
            'email' => ['required', 'string', Rule::exists((new PublicServant())->getTable(), 'email')],
            'cname' => ['required', 'string', Rule::exists((new Country())->getTable(), 'cname')],
            'disease_code' => ['required', 'string', Rule::exists((new Disease())->getTable(), 'disease_code')],
            'total_deaths' => ['required', 'int'],
            'total_patients' => ['required', 'int']
        ];
    }
}
