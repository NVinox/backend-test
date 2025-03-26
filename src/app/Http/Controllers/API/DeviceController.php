<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        return $this->deviceModel->all();
    }

    public function getOne(string $id)
    {
        return $this->deviceModel->find($id);
    }

    public function create(Request $request)
    {
        return $this->deviceModel->create($request);
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
