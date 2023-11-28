<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Notifications\Notifiable;
class EmpDetails extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory, Notifiable;
    protected $primaryKey = 'emp_id';
    public $incrementing = false;
    protected $fillable = [
        'emp_id',
        'first_name',
        'contractor_company_id',
        'last_name',
        'date_of_birth',
        'gender',
        'email',
        'company_name',
        'company_email',
        'mobile_number',
        'alternate_mobile_number',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'hire_date',
        'employee_type',
        'department',
        'job_title',
        'manager_id',
        'report_to',
        'employee_status',
        'emergency_contact',
        'password',
        'image',
        'blood_group',
        'nationality',
        'religion',
        'marital_status',
        'spouse',
        'physically_challenge',
        'inter_emp',
        'job_location',
        'education',
        'experince',
        'pan_no',
        'adhar_no',
        'pf_no',
        'nick_name',
        'time_zone',
        'biography',
        'facebook',
        'twitter',
        'linked_in',
        'company_id',
        'is_starred',
        'skill_set',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(CompanyDetails::class, 'company_id', 'company_id');
    }
    // protected $guarded = ['emp_id']; // Make sure 'emp_id' is not mass assignable

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (empty($model->emp_id)) {
    //             $model->emp_id = $model->generateEmpId();
    //         }
    //     });
    // }

    // private function generateEmpId()
    // {
    //     // Find the maximum emp_id for the given company_name
    //     $maxEmpId = self::where('company_name', $this->company_name)->max('emp_id');

    //     // Extract the numeric part of the max emp_id, increment it by 1, and pad it with zeros
    //     $numericPart = (int) substr($maxEmpId, 4) + 1;
    //     $paddedNumericPart = str_pad($numericPart, 4, '0', STR_PAD_LEFT);

    //     // Combine company_name and padded numeric part to create the new emp_id
    //     return strtoupper(substr($this->company_name, 0, 3)) . '-' . $paddedNumericPart;
    // }




//     private function generateEmpId()
// {
//     // Find the maximum emp_id for the given company_name
//     $maxEmpId = self::where('company_name', $this->company_name)->max('emp_id');

//     // Set the starting numeric part
//     $startNumericPart = 1001;

//     // Extract the numeric part of the max emp_id, increment it, and pad it with zeros
//     $numericPart = 1; // Default value if $maxEmpId is null
//     if (!is_null($maxEmpId) && is_string($maxEmpId)) {
//         $numericPart = max((int) substr($maxEmpId, 4) + 1, $startNumericPart);
//     }
//     $paddedNumericPart = str_pad($numericPart, 4, '0', STR_PAD_LEFT);

//     // Combine company_name and padded numeric part to create the new emp_id
//     return strtoupper(substr($this->company_name, 0, 3)) . '-' . $paddedNumericPart;
// }

}

