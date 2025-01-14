<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'company_profile';
    public $timestamps = true;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'abbreviation',
        'name',
        'address',
        'email',
        'phone',
        'about',
    ];
}
