<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'errors' => 'Model Not Found',
            ], Response::HTTP_NOT_FOUND);
        }

        if($e instanceof NotFoundHttpException) {
            return response()->json([
                'errors' => 'Incorrect route',
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }
}
