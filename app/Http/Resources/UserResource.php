<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
class UserResource extends JsonResource
{

    public function toArray( $request): array
{
    $cdoName = $this->Cdo ? $this->cdo->name : 'N/A';

    return [
        'id' => $this->id,
        'fullName' => $this->fullName,
        'phoneNumber' => $this->phoneNumber,
        'role' => $this->role,
        'address' => $this->address,
        'cdo_name' => $cdoName,
        'cdo_id' =>$this->cdo_id
    ];
}
}
