<?php

namespace App\Http\Resources\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DeviceResourceCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
        ];
    }

    public function with(Request $request)
    {
        return [
            'status' => 'success'
        ];
    }

    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header('Accept', 'application/json');
    }
}
