<?php

namespace App\Http\Resources;

use App\Models\DetalleMantenimiento;
use App\Models\ObservacionMantenimiento;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistroMantenimientoResource extends JsonResource
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
            'id' => $this->id,
            'placa_vehiculo' => $this->placa_vehiculo,
            'fecha_emision' => $this->fecha_emision,
            'fecha_salida' => $this->fecha_salida,
            'nombre_taller' => $this->nombre_taller,
            'km_actual' => $this->km_actual,
            'nro_factura' => $this->nro_factura,
            'nro_proforma' => $this->nro_proforma,
            'detalle' => DetalleMantenimientoResource::collection(DetalleMantenimiento::where('id_registro', $this->id)->get()),
            'observaciones' => ObservacionMantenimientoResource::collection(ObservacionMantenimiento::where('id_registro', $this->id)->get())
        ];
    }
}
