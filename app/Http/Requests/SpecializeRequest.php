<?php

namespace App\Http\Requests;

use App\Models\DiseaseType;
use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $email
 * @property string $id
 */

class SpecializeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'string', Rule::exists((new Doctor())->getTable(), 'email')],
            'id' => ['required', 'string', Rule::exists((new DiseaseType())->getTable(), 'id')],
        ];
    }
}
