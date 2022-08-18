<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable=['id','doctor_id', 'identity_no', 'name', 'surname', 'telephone', 'date', 'hour', 'isActive'];
    public function doctor(){
        return $this->belongsTo(Doctors::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
