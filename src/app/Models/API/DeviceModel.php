<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;
    const TABLE = 'devices';

    protected $table = self::TABLE;
    protected $fillable = [
        'id',
        'name',
        'memory_volume',
        'ram_volume',
        'battery_volume',
        'core_counts',
        'core_frequency',
        'display_width',
        'display_height',
        'nfc',
    ];
}
