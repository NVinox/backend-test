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

    public function id()
    {
        return (int) $this->id;
    }

    public function name()
    {
        return (string) $this->name;
    }

    public function memory_volume()
    {
        return (int) $this->memory_volume;
    }

    public function ram_volume()
    {
        return (int) $this->ram_volume;
    }

    public function battery_volume()
    {
        return (int) $this->battery_volume;
    }

    public function core_counts()
    {
        return (int) $this->core_counts;
    }

    public function core_frequency()
    {
        return (float) $this->core_frequency;
    }

    public function display_width()
    {
        return (int) $this->display_width;
    }

    public function display_height()
    {
        return (int) $this->display_width;
    }

    public function nfc()
    {
        return (bool) $this->nfc;
    }
}
