<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'type', 'expected_lifespan', 'brand_id'])]

class DeviceModel extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'model_id');
    }
}
