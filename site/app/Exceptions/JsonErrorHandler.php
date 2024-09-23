<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class JsonErrorHandler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Throwable  $e
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof MethodNotAllowedHttpException) {
            abort(JsonResponse::HTTP_METHOD_NOT_ALLOWED, 'Method not allowed');
        }

        if ($request->isJson() && $e instanceof ValidationException) {
            return response()->json([
                'status' => 'error',
                'message' => [
                    'errors' => $e->getMessage(),
                    'fields' => $e->validator->getMessageBag()->toArray()
                ]
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $e);
    }
}
