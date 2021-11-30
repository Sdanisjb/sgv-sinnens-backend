<?php

namespace App\Http\Resources;

use App\Models\ObservacionAutrisa;
use Illuminate\Http\Resources\Json\JsonResource;

class PermisoAutrisaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'fecha_emision' => $this->fecha_emision,
            'fecha_venc' => $this->fecha_venc,
            'fecha_exam' => $this->fecha_exam,
            'hora_lev_obs' => $this->hora_lev_obs,
            'lugar_lev_obs' => $this->lugar_lev_obs,
            'observacion' => ObservacionAutrisaResource::collection(ObservacionAutrisa::where('placa_vehiculo', $this->placa))
        ];
    }
}
