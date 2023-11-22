<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $fillable = [
        'company_id',
        'company_name',
        'company_address1',
        'company_address2',
        'company_registration_date',
        'company_logo',
        'contact_email',
        'contact_phone',
        'ceo_name'
    ];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // If company_id is not provided, generate a value in the format mmyyyyxxx (xxx is random)
            if ($model->company_id === null) {
                $monthYear = date('my'); // Get the current month and year
                $randomDigits = mt_rand(1, 999); // Generate random three-digit number

                $model->company_id = $monthYear . str_pad($randomDigits, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}
