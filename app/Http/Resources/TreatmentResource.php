<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
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
                'treatmentName'=>$this->treatment_name,
                'createdAt'=>date('d-m-Y H:i', strtotime($this->created_at)),
                'updatedAt'=>date('d-m-Y H:i', strtotime($this->updated_at))
            ];
    }
}
