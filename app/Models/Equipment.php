<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'serial_number',
    'purchase_date',
    'warranty_until',
    'last_calibration',
    'photo',
    'model_id',
    'customer_id',
    'manual_id'
])]
class Equipment extends Model
{
    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class);
    // }

    // public function manual()
    // {
    //     return $this->belongsTo(Manual::class);
    // }
}
