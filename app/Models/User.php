<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'id_role',
        'email',
        'password',
        'datetime_last_login',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $with = [
        'role',
        'employee',
        'client',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id_user', 'id');
    }
    public function client()
    {
        return $this->hasOne(Client::class, 'id_user', 'id');
    }
}
