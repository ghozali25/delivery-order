<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'abbreviation',
        'name',
    ];



    public function role()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
}
