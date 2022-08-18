<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        return $this->userService=$userService;
    }

    public function addAppointment(Request $request){
        $this->authorize('user');

        $data=$request->only([
            'doctorId',
            'name',
            'surname',
            'telephone',
            'identityNo',
            'date',
            'hour'
        ]);


        try{
            $result=$this->userService->addAppointment($data);
            $message = 'Randevu başarıyla eklendi';
            return $this->sendResponse(new AppointmentResource($result), $message);
        } catch (Exception $e){
            $message = $e->getMessage();
            return $this->sendError($message);
        }
    }

}
