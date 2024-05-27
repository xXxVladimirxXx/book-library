<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
    * @param Exception|string $e
    * @param int $code
    * @return \Illuminate\Http\JsonResponse
    */
    public function errorResponse($e, $code = null)
    {
        if (is_string($e)) {
            $e = new Exception($e, $code);
        }

        $code = $code ?: $e->getCode() ?: 500;
        $message = $e->getMessage();

        return response()->json([
            'status' => 'error',
            'code' => $code,
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'message' => $message,
            'trace' => config('app.debug') ? $e->getTrace() : null,
        ], ($code < 100 || $code >= 600) ? 500 : $code);
    }

    /*
    * @param $data
    * @param null $message
    * @return \Illuminate\Http\JsonResponse
    */
    public function successResponse($data, $message = null, $status = 200)
    {
        return response()->json([
            'data' => $data,
            'status' => 'success',
            'success' => true,
            'message' => $message
        ], $status);

    }
}