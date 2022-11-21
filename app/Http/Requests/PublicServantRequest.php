<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string email
 * @property string department
 */

class PublicServantRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', Rule::exists((new User())->getTable(), 'email')],
            'department' => ['required', 'string', 'max:50']
        ];
    }
}
