<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable=['id','clinic_id', 'name', 'surname', 'tc_no', 'telephone', 'image'];

    public function clinic(){
        return $this->belongsTo(Clinics::class);
    }
    public function appointment(){
        return $this->hasMany(Appointments::class);
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatments::class, 'doctor_treatment', 'doctor_id', 'treatment_id');
    }
}
