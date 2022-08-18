<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClinicResource;
use App\Services\ClinicService;
use Illuminate\Http\Request;
use Exception;

class ClinicController extends Controller
{
    protected $clinicService;

    public function __construct(ClinicService $clinicService)
    {
        $this->clinicService = $clinicService;
    }

    public function updateClinicName(Request $request, $id)
    {
        $this->authorize('clinic');
        $data = $request->name;
        try {
            $result= $this->clinicService->updateClinicName($data, $id);
            $message = 'Güncelleme işleminiz gerçekleştirildi.';
            return $this->sendResponse(new ClinicResource($result), $message);

        } catch (Exception $e) {

            $message = $e->getMessage();
                return $this->sendError($message);
        }
    }


}
