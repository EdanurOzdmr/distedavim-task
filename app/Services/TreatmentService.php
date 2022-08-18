<?php

namespace App\Services;

use App\Repositories\TreatmentRepository;

class TreatmentService
{
    protected $treatmentRepository;

    public function __construct(TreatmentRepository $treatmentRepository)
    {
        $this->treatmentRepository = $treatmentRepository;
    }

    public function getAllTreatments($clinicId)
    {

        return $this->treatmentRepository->getAllTreatments($clinicId);

    }

    public function addTreatmentDoctor($data)
    {
        $result=$this->treatmentRepository->addTreatmentDoctor($data);

        return $result;
    }
}
