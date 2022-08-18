<?php

namespace App\Repositories;

use App\Models\Treatments;

class TreatmentRepository
{

    protected $treatment;

    public function __construct(Treatments $treatments)
    {
        $this->treatment = $treatments;
    }

    public function getAllTreatments($clinicId)
    {
        return Treatments::where('clinic_id', $clinicId)->get();
    }

    public function addTreatmentDoctor($data)
    {

        $treatment = Treatments::create([
            'clinic_id' => $data['clinicId'],
            'treatment_name' => $data['treatmentName'],
        ]);

        $treatment->doctors()->attach($data['doctorId']);

        return $treatment;

    }
}

