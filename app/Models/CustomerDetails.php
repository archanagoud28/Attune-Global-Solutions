<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'customer_id',
        'customer_profile',
        'company_id',     
        'customer_name', 
        'customer_company_name', 
        'email',         
        'phone',          
        'address',         
        'notes',           
    ];
    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
}
