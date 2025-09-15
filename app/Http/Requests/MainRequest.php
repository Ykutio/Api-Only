<?php

namespace App\Http\Requests;

use App\Constants\StatusResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class MainRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(
            Response::json([
                'status' => StatusResponse::ERROR,
                'errors' => $errors->messages(),
            ])
        );
    }
}
