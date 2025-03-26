<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\DeviceResource;
use App\Http\Resources\API\DeviceResourceCollection;
use App\Models\API\DeviceModel;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    protected $deviceModel;

    public function __construct()
    {
        $this->deviceModel = new DeviceModel();
    }

    public function getAll()
    {
        return new DeviceResourceCollection(DeviceModel::all());
    }

    public function getOne(string $id)
    {
        $device = DeviceModel::find($id);
        return (new DeviceResource($device))->response()->setStatusCode(200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'memory_volume' => 'required',
            'ram_volume' => 'required',
            'battery_volume' => 'required',
            'core_frequency' => 'required',
            'display_width' => 'required',
            'display_height' => 'required',
        ]);

        $device = DeviceModel::create([
            'name' => $request->input('name'),
            'memory_volume' => $request->input('memory_volume'),
            'ram_volume' => $request->input('ram_volume'),
            'battery_volume' => $request->input('battery_volume'),
            'core_counts' => $request->input('core_counts'),
            'core_frequency' => $request->input('core_frequency'),
            'display_width' => $request->input('display_width'),
            'display_height' => $request->input('display_height'),
            'nfc' => $request->input('nfc'),
        ]);

        return (new DeviceResource($device))->response()->setStatusCode(201);
    }

    public function update(Request $request, string $id)
    {
        $device = $this->deviceModel->find($id);
        $device->update($request->all());
        return $device;
    }

    public function delete(string $id)
    {
        $device = $this->deviceModel->find($id);
        return $device->delete();
    }
}
