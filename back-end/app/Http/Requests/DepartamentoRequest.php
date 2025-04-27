<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'                    => 'required|string|max:120',
            'empresa_facturacion_id'    => 'required|string|exists:empresas_facturacion,_id',
        ];
    }

}
