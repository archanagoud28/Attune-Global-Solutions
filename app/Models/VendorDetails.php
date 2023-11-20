<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'vendor_id';
    protected $fillable = [
        'vendor_id',
        'company_id',
        'vendor_name',
        'vendor_image',
        'contact_person',
        'email',
        'phone_number',
        'address',
        'tax_id',
        'registration_number',
        'contract_start_date',
        'contract_end_date',
        'contract_value',
        'payment_terms',
        'product_or_service_description',
        'pricing_information',
        'business_registration_certificate',
        'licenses_and_permits',
        'insurance_documents',
        'past_performance_history',
        'references',
        'terms_and_conditions',
        'service_level_agreements',
        'non_disclosure_agreements',
        'quality_control_measures',
        'industry_compliance',
        'primary_point_of_contact',
        'communication_channels',
        'support_availability',
        'reporting_requirements',
        'access_for_audits',
        'monitoring_processes',
        'termination_conditions',
        'renewal_terms',
        'integration_processes',
        'vendor_onboarding_process',
        'training_requirements',
        // Add other fields as needed
    ];
}
