<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;

class DeviceDeleteResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'success' => true,
        ];
    }

    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header('Accept', 'application/json');
    }
}
