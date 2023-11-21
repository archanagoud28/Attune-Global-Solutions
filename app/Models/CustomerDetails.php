<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_id',
        'customer_profile',
        'company_id',      // Foreign key linking to the IT company
        'customer_name',   // Full name of the customer
        'email',           // Email address of the customer
        'phone',           // Phone number of the customer
        'address',         // Physical address of the customer
        'notes',           // Additional notes or comments about the customer
    ];
    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
}
