<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $table = 'sales_orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'so_number',
        'emp_id',
        'job_title',
        'start_date',
        'end_date',
        'rate',
        'customer_id',
        'end_client_timesheet_required',
        'time_sheet_type',
        'time_sheet_begins',
        'invoice_type',
        'payment_terms',
        'company_id',
    ];
    public function cus()
    {
        return $this->belongsTo(CustomerDetails::class, 'customer_id', 'customer_id');
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
