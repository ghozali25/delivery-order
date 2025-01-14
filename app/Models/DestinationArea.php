<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationArea extends Model
{
    use HasFactory;

    protected $table = 'destination_areas';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'abbreviation',
        'name',
    ];



    public function delivery_costs()
    {
        return $this->hasMany(DeliveryCost::class, 'id_destination_area', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_destination_area', 'id');
    }
}
