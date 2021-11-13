<?php

namespace App\Http\Resources;

use App\Models\PermisoAutrisa;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermisoAutrisaResource;
use App\Models\PermisoTranspMercancia;
use App\Models\Soat;

class VehicleResource extends JsonResource
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
            'placa' => $this->placa,
            'usuario' => $this->usuario,
            'tipo' => $this->tipo,
            'unidad' => $this->unidad,
            'anho' => $this->anho,
            'permiso_autrisa' => new PermisoAutrisaResource(PermisoAutrisa::find($this->placa)),
            'permiso_mtc' => new PermisoMTCResource(PermisoAutrisa::find($this->placa)),
            'soat' => new SoatResource(Soat::find($this->placa)),
            'permiso_transp_mercancia' => new PermisoTranspMercancia(PermisoTranspMercancia::find($this->placa))
        ];
    }
}
