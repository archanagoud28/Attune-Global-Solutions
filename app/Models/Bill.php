<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bill_number',
        'vendor_id',
        'amount',
        'due_date',
        'payment_terms',
        'description',
        'status',
        'currency',
        'notes',
        'company_id',
    ];

    public function vendor()
    {
        return $this->belongsTo(VendorDetails::class,'vendor_id','vendor_id');
    }

    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id','company_id');
    }
}
