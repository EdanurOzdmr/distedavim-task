<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Doctors;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $clinicService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function updateAppointment(Request $request)
    {

        $hour = $request->hour;
        $identityNo = $request->identityNo;
        $date = $request->date;

        try {
            $result = $this->appointmentService->updateAppointmentHour($hour, $identityNo, $date);
            $message = 'Güncelleme işleminiz gerçekleştirildi.';
            return $this->sendResponse($result, $message);

        } catch (Exception $e) {
            $message = $e->getMessage();
            return $this->sendError($message);
        }
    }
}
