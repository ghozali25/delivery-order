<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'ktp',
        'name',
        'phone',
        'address',
        'datetime_inactive',
    ];
    protected function onDelivery(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->orders()->whereNull('datetime_closed')->count() > 0 ? true : false;
            }
        );
    }



    public function orders()
    {
        return $this->hasMany(Order::class, 'id_driver', 'id');
    }
}
