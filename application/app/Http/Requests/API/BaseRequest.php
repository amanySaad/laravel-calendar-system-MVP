<?php

namespace App\Http\Requests\API;

use App\Traits\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    use Response;

    protected function failedValidation(Validator $validator)
    {

        $errors = $validator->errors()->messages();
        $errors = array_map(function ($k, $v) {
            return ['field_name' => $k, 'message' => $v[0]];
        }, array_keys($errors), $errors);
        throw new ValidationException($validator, $this->error()->validation(['message' => 'validation_error', 'errors' => $errors]));
    }

    protected function failedAuthorization()
    {
        throw new AuthorizationException(trans('admin.no_auth'));
    }
}
