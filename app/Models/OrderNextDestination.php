<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNextDestination extends Model
{
    use HasFactory;

    protected $table = 'orders_next_destinations';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_order',
        'id_destination_area',
        'cost',
    ];



    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
    public function destination_area()
    {
        return $this->belongsTo(DestinationArea::class, 'id_destination_area', 'id');
    }
}
