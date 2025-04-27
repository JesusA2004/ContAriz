<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaBancariaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cuentaBancaria' => 'required|string|max:50',
            'tarjeta'        => 'nullable|string|max:16',
            'clabeI'         => 'nullable|string|max:18',
            'nombreBanco'    => 'nullable|string|max:100',
            'empleado_id'    => 'required|string|exists:empleados,_id',
        ];
    }

}
