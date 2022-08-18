<?php

namespace App\Http\Controllers;

use App\Http\Resources\TreatmentResource;
use Illuminate\Http\Request;
use App\Services\TreatmentService;
use Exception;

class TreatmentController extends Controller
{

    protected $treatmentService;
    public function __construct(TreatmentService $treatmentService)
    {
       return $this->treatmentService=$treatmentService;
    }

    public function getClinicTreatment($clinicId){
        $this->authorize('clinic');
        try{
            $result=$this->treatmentService->getAllTreatments($clinicId);
            $message = 'başarılı sonuç.';
            return $this->sendResponse($result, $message);

        } catch (Exception $e){
            $message = $e->getMessage();
            return $this->sendError($message);
        }}

    public function addTreatmentDoctor(Request $request){
        $this->authorize('clinic');
        $data=$request->only([
            'clinicId',
            'treatmentName',
            'doctorId'
        ]);

        try{
            $result=$this->treatmentService->addTreatmentDoctor($data);
            $message = 'Yeni tedavi eklendi.';
            return $this->sendResponse(new TreatmentResource($result), $message);
        } catch (Exception $e){
            $message = $e->getMessage();
            return $this->sendError($message);
        }
    }
}
