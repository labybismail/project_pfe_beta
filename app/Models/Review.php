<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }
}
