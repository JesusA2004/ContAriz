<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'nombre'             => 'required|string|max:50',
            'apellidoP'          => 'required|string|max:50',
            'apellidoM'          => 'required|string|max:50',
            'imss'               => 'required|string|max:50',
            'registroPatronal'   => 'required|string|max:50',
            'cp'                 => 'required|integer',
            'nss'                => 'required|string|max:50',
            'rfc'                => 'required|string|max:50',
            'curp'               => 'required|string|max:50',
            'fechaAltaImss'      => 'required|date',
            'sdi'                => 'required|numeric',
            'estado'             => 'required|string|max:50',
            'creditoInfonavit'   => 'required|numeric',
            'fechaIngreso'       => 'required|date',
            'fechaAguinaldo'     => 'required|date',
            'estatus'            => 'required|integer',
            // si embebes departamento:
            'departamento'       => 'required|array',
            // o si usas referencia:
            // 'departamento_id'    => 'required|string|exists:departamentos,_id',
        ];

        return $rules;
    }

}
