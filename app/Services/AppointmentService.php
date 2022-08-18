<?php
namespace App\Services;

use App\Repositories\AppointmentRepository;
use InvalidArgumentException;

class AppointmentService
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }
    public function updateAppointmentHour($data, $identityNo, $date)
    {
        try {
            $appointment = $this->appointmentRepository->updateAppointmentHour($data, $identityNo, $date);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update hour data');

        }
        return $appointment;

    }

}
