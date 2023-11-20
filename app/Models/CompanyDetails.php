<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $fillable = [
        'company_id',
        'company_name',
        'company_address1',
        'company_address2',
        'company_registration_date',
        'company_logo',
        'contact_email',
        'contact_phone'
    ];
}
