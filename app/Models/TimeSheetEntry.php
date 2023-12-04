<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheetEntry extends Model
{
   
 use HasFactory;
    protected $table = 'time_sheet_entries';
 
    public $timestamps = false;
    protected $fillable = [
        'emp_id',
        'day',
        'regular',
        'casual',
        'sick',
    ];
 
    public function employee()
    {
        return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
    }
}
