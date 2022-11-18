<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $salary
 * @property string $phone
 * @property string $cname
 */

class UserRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'surname' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:60'],
            'salary' => ['required', 'int'],
            'phone' => ['required', 'string', 'max:20'],
            'cname' => [Rule::exists((new Country())->getTable() , 'cname')]
        ];
    }

}
