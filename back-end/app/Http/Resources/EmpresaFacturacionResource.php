<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaFacturacionResource extends JsonResource
{

    public static $wrap = 'actualizacion';

    public function toArray($request): array
    {
        return [
            // conviertes el ObjectId a string si lo necesitas
            'id'        => (string) $this->_id,
            'nombre'    => $this->nombre,
            'plaza_id'  => $this->plaza_id,
            'created_at'=> optional($this->created_at)->toIso8601String(),
            'updated_at'=> optional($this->updated_at)->toIso8601String(),
        ];
    }

}
