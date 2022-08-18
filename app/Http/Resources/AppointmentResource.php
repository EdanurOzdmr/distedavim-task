<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'identityNo'=>$this->identity_no,
                'name'=>$this->name,
                'surname'=>$this->surname,
                'telephone'=>$this->telephone,
                'date'=>date('d-m-Y', strtotime($this->date)),
                'hour'=>$this->hour,
                'createdAt'=>date('d-m-Y H:i', strtotime($this->created_at)),
                'updatedAt'=>date('d-m-Y H:i', strtotime($this->updated_at))
            ];
    }
}
