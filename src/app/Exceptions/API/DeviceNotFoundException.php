<?php

namespace App\Exceptions\API;

use Exception;

class DeviceNotFoundException extends Exception
{
    protected $message = "Record of device is not found";
    protected $code = 404;

    public function report(): void {}

    public function render()
    {
        return response()->json([
            'error' => [
                'message' => $this->message,
                'type' => 'notFound',
                'code' => 404,
            ]
        ], $this->code);
    }
}
