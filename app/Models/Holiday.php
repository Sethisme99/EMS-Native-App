<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'notes',
        'start_date',
        'end_date',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeWithRelationshipAutoloading($query)
    {
        return $query->with('employee');
    }

}
