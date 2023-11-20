<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorsDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'contractor_id';
    protected $fillable = [
        'contractor_id',
        'client_name',
        'client_address',
        'it_company_name',
        'it_company_address',
        'effective_date',
        'scope_of_work',
        'project_timeline',
        'total_amount',
        'payment_schedule',
        'intellectual_property',
        'confidentiality_terms',
        'communication_plan',
        'quality_assurance_process',
        'warranty_details',
        'support_terms',
        'termination_conditions',
        'dispute_resolution',
        'insurance_requirements',
        'governing_law',
        'company_id',
    ];

    protected $dates = ['effective_date', 'project_timeline'];

    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
}
