<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'slug', 'description', 'country', 'link', 'support_email', 'warranty_phone', 'photo', 'is_active'])]
class Brand extends Model
{
    public function deviceModels()
    {
        return $this->hasMany(DeviceModel::class, 'brand_id', 'brand_id');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
