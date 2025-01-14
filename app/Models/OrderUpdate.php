<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUpdate extends Model
{
    use HasFactory;

    protected $table = 'orders_updates';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_order',
        'datetime_updated',
        'note',
        'cost',
    ];



    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
}
