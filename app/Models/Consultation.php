<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctorId','id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }
}
