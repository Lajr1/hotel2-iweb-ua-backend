<?php

namespace App\Exceptions;


trait ResponseHelper
{

    public function makeSuccessResponse($data = [], $code = 200)
    {
        return response()->json($data, $code);
    }

    public function makeErrorResponse($data, $code)
    {
        return $this->makeSuccessResponse(['error' => $data], $code);
    }
}
