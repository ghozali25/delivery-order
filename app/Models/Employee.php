<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_user',
        'ktp',
        'name',
        'phone',
        'address',
        'datetime_inactive',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_employee', 'id');
    }
}
