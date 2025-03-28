<?php

namespace App\Http\Controllers\API;

use App\Exceptions\API\DeviceCreateException;
use App\Exceptions\API\DeviceNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\DeviceDeleteResource;
use App\Http\Resources\API\DeviceResource;
use App\Http\Resources\API\DeviceResourceCollection;
use App\Models\API\DeviceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    public function getAll()
    {
        return new DeviceResourceCollection(DeviceModel::all());
    }

    public function getOne(string $id)
    {
        $device = DeviceModel::find($id);

        if (!$device) {
            return throw new DeviceNotFoundException();
        }

        return (new DeviceResource($device))->response()->setStatusCode(200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'memory_volume' => 'required|integer',
            'ram_volume' => 'required|integer',
            'battery_volume' => 'required|integer',
            'core_frequency' => 'required|numeric',
            'display_width' => 'required|integer',
            'display_height' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'message' => 'Bad request',
                    'errors' => $validator->messages(),
                    'type' => 'badRequest',
                    'code' => 400,
                ]
            ], 400);
        }

        $device = DeviceModel::create($request->all());

        return (new DeviceResource($device))->response()->setStatusCode(201);
    }

    public function update(Request $request, string $id)
    {
        $device = DeviceModel::find($id);

        if (!$device) {
            return throw new DeviceNotFoundException();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'memory_volume' => 'integer',
            'ram_volume' => 'integer',
            'battery_volume' => 'integer',
            'core_frequency' => 'numeric',
            'display_width' => 'integer',
            'display_height' => 'integer',
            'nfc' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'message' => 'Bad request',
                    'errors' => $validator->messages(),
                    'type' => 'badRequest',
                    'code' => 400,
                ]
            ], 400);
        }

        $device->update($request->all());

        return (new DeviceResource($device))->response()->setStatusCode(200);
    }

    public function delete(string $id)
    {
        $device = DeviceModel::find($id);

        if (!$device) {
            return throw new DeviceNotFoundException();
        }

        $device->delete();

        return (new DeviceDeleteResource($device))->response()->setStatusCode(200);
    }
}
