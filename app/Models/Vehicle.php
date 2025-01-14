<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'plate',
        'id_vehicle_type',
        'brand',
        'model',
        'color',
    ];
    protected function onDelivery(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->orders()->whereNull('datetime_closed')->count() > 0 ? true : false;
            }
        );
    }



    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'id_vehicle_type', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_vehicle', 'id');
    }
}
