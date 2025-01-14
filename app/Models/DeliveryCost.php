<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCost extends Model
{
    use HasFactory;

    protected $table = 'delivery_costs';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_destination_area',
        'id_vehicle_type',
        'cost_first',
        'cost_second',
    ];



    public function destination_area()
    {
        return $this->belongsTo(DestinationArea::class, 'id_destination_area', 'id');
    }
    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'id_vehicle_type', 'id');
    }
}
