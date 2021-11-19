<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $roles = [];

        /* Rellenar el arreglo de roles con todos los que posea el usuario*/
        if (User::find($this->DNI)->gerente_general) {
            array_push($roles, 'gerente_general');
        }
        if (User::find($this->DNI)->gerente_tecnico) {
            array_push($roles, 'gerente_tecnico');
        }
        if (User::find($this->DNI)->operador) {
            array_push($roles, 'operador');
        }
        if (User::find($this->DNI)->admin_logistica) {
            array_push($roles, 'admin_logistica');
        }

        return parent::toArray($request);
    }
}
