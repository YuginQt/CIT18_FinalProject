<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Define which attributes can be mass-assigned
    protected $fillable = [
        'name',
        'age',
        'gender',
        'contact_info',
        'medical_history',
        'current_medications',
        'diagnosis',
        'doctor_id', // Assuming doctor_id links the patient to the doctor
    ];

    // Alternatively, you can use the guarded property to block unwanted mass assignment
    // protected $guarded = [];

    // Define the relationship: A patient belongs to a specific doctor
    public function doctor()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }
}

