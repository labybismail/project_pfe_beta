<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    } 
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
