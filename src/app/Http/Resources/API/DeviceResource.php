<?php

namespace App\Http\Resources\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'memory_volume' => $this->memory_volume(),
            'ram_volume' => $this->ram_volume(),
            'battery_volume' => $this->battery_volume(),
            'core_counts' => $this->core_counts(),
            'core_frequency' => $this->core_frequency(),
            'display' => [
                'width' => $this->display_width(),
                'height' => $this->display_height()
            ],
            'nfc' => $this->nfc(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function with(Request $request)
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
