<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinics extends Model
{
    use HasFactory;
    protected $fillable=['id','clinic_name'];

    public function doctor(){
        return $this->hasMany(Doctors::class);
    }

    public function treatment(){
        return $this->hasMany(Treatments::class);
    }
}
