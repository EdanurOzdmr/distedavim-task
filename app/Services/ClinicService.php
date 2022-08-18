<?php

namespace App\Services;

use App\Repositories\ClinicRepository;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ClinicService
{
    protected $clinicRepository;

    public function __construct(ClinicRepository $clinicRepository)
    {
        $this->clinicRepository = $clinicRepository;
    }

    public function updateClinicName($data, $id)
    {
        try {
            $clinicName = $this->clinicRepository->updateClinicName($data, $id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update name data');
        }
        return $clinicName;

    }



}
