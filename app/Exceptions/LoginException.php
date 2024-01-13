<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class LoginException extends Exception
{
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        return response()->json([
            'success' => false,
            'error' => $this->formatErrorBlock(
                $this->validator
            )
        ], JsonResponse::HTTP_BAD_REQUEST);
    }

    public function formatErrorBlock($validator)
    {
        $errors = $validator->errors()->toArray();
        $return = array();
        foreach ($errors as $field => $message) {
            $obj = [$field => $message[0]];
            $return[] = $obj;
        }
        return $return;
    }
}
