<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_client',
        'id_employee',
        'id_driver',
        'id_vehicle',
        'cargo_name',
        'cargo_weight_kg',
        'cargo_note',
        'recipient_name',
        'recipient_phone',
        'recipient_address',
        'id_destination_area',
        'cost',
        'datetime_ordered',
        'datetime_confirmed',
        'datetime_assigned',
        'datetime_closed',
    ];
    protected function confirmed(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->datetime_confirmed ? true : false,
        );
    }
    protected function assigned(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->datetime_assigned ? true : false,
        );
    }
    protected function closed(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->datetime_closed ? true : false,
        );
    }
    protected function orderNo(): Attribute
    {
        return Attribute::make(
            get: fn() => str_pad($this->id, '10', '0', STR_PAD_LEFT),
        );
    }
    protected function updateCost(): Attribute
    {
        return Attribute::make(
            get: function () {
                $cost = 0;
                foreach ($this->orders_updates as $orderUpdate) {
                    $cost += $orderUpdate->cost ?? 0;
                }
                return $cost;
            }
        );
    }
    protected function nextDestinationCost(): Attribute
    {
        return Attribute::make(
            get: function () {
                $cost = 0;
                foreach ($this->orders_next_destinations as $orderNextDestination) {
                    $cost += $orderNextDestination->cost;
                }
                return $cost;
            }
        );
    }
    protected function totalCost(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->cost + $this->update_cost + $this->next_destination_cost,
        );
    }



    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee', 'id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle', 'id');
    }
    public function destination_area()
    {
        return $this->belongsTo(DestinationArea::class, 'id_destination_area', 'id');
    }
    public function orders_updates()
    {
        return $this->hasMany(OrderUpdate::class, 'id_order', 'id');
    }
    public function orders_next_destinations()
    {
        return $this->hasMany(OrderNextDestination::class, 'id_order', 'id');
    }
}
