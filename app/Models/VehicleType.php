<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $table = 'vehicle_types';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'abbreviation',
        'name',
        'max_cargo_weight_kg',
    ];



    public function delivery_costs()
    {
        return $this->hasMany(DeliveryCost::class, 'id_vehicle_type', 'id');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'id_vehicle_type', 'id');
    }
}
