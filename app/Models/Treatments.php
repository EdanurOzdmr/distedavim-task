<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    use HasFactory;
    protected $fillable=['id','clinic_id', 'treatment_name'];

    public function clinic(){
        return $this->belongsTo(Clinics::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctors::class, 'doctor_treatment', 'treatment_id', 'doctor_id');
    }


}
