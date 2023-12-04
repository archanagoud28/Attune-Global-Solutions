<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'po_number',
        'emp_id',
        'job_title',
        'start_date',
        'end_date',
        'rate',
        'vendor_id',
        'end_client_timesheet_required',
        'time_sheet_type',
        'time_sheet_begins',
        'invoice_type',
        'payment_terms',
        'company_id',
    ];
    public function ven()
    {
        return $this->belongsTo(VendorDetails::class, 'vendor_id', 'vendor_id');
    }
    public function com()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
    public function emp()
    {
        return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
    }
}
