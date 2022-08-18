<?php

namespace App\Repositories;

use App\Models\Appointments;

class AppointmentRepository
{

    protected $treatment;

    public function __construct(Appointments $appointments)
    {
        $this->appointment = $appointments;
    }


    public function updateAppointmentHour($data, $identityNo, $date)
    {

        Appointments::where([
            ['identity_no', $identityNo],
            ['date', $date]
        ])
            ->update(['hour' => $data]);

        $appointment=Appointments::where([
            ['identity_no', $identityNo],
            ['date', $date]
        ])->get();

        return $appointment;
    }
}
