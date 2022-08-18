<?php

namespace App\Repositories;

use App\Models\Appointments;
use App\Models\Clinics;

class ClinicRepository

{
    protected $treatment;

    public function __construct(Clinics $clinics)
    {
        $this->clinic = $clinics;
    }

    public function updateClinicName($data, $id)
    {
        $clinic=$this->clinic->find($id);
        $clinic->clinic_name=$data;
        $clinic->update();

        return $clinic;
    }



}
