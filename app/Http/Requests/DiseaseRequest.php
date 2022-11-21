<?php

namespace App\Http\Requests;

use App\Models\DiseaseType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string disease_code
 * @property string pathogen,
 * @property string description,
 * @property int id
 */


class DiseaseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'disease_code' => ['required', 'string', 'max:50'],
            'pathogen' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:140'],
            'id' => ['required', 'int', Rule::exists((new DiseaseType())->getTable(), 'id')]
        ];
    }
}
