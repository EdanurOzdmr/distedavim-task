<?php

namespace App\Repositories;

use App\Models\Appointments;
use App\Models\User;

class UserRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function addAppointment($data)
    {

        $result = Appointments::create([
            'doctor_id' => $data['doctorId'],
            'name'=>$data['name'],
            'surname'=>$data['surname'],
            'telephone'=>$data['telephone'],
            'identity_no' => $data['identityNo'],
            'date' => $data['date'],
            'hour' => $data['hour'],
        ]);

        return $result;
    }
}
