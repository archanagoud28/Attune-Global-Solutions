<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class HrDetail extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    protected $fillable = [
        'company_id',
        'hr_id',
        'name', 'email', 'phone', 'address', 'password',
        'status'
    ];
}
