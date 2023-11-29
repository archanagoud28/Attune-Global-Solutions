<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheetEntry extends Model
{
    use HasFactory;
    protected $table = 'time_sheet_entries';
 
  
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'week_start_date',
        'weekly_hours',
        'regular',
        'leave',
        'sick',
        'casual',
    ];

    protected $casts = [
        'week_start_date' => 'date',
        'weekly_hours' => 'json',
        'regular' => 'boolean',
        'leave' => 'boolean',
        'sick' => 'boolean',
        'casual' => 'boolean',
    ];

    // Relationships or other model methods can be added here if needed

    public function employee()
    {
        return $this->belongsTo(EmpDetails::class, 'emp_id', 'emp_id');
    }
}
