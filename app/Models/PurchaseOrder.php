<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $casts = [
        'employees_and_skills' => 'array',
    ];
    protected $fillable = [
        'po_number',
        'customer_id',
        'vendor_id',
        'rate',
        'employees_and_skills',
        'end_client_timesheet_required',
        'time_sheet_type',
        'time_sheet_begins',
        'invoice_type',
        'payment_type',
    ];
    public function vendor()
    {
        return $this->belongsTo(VendorDetails::class, 'vendor_id', 'vendor_id');
    }
}
