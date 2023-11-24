<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_number',
        'customer_id',
        'vendor_id',
        'rate',
        'end_client_timesheet_required',
        'time_sheet_type',
        'time_sheet_begins',
        'invoice_type',
        'payment_type',
    ];

    public function vendor()
    {
        return $this->belongsTo(VendorDetails::class);
    }
}
