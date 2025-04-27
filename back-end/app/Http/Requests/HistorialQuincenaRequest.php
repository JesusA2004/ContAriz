<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialQuincenaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quincena'    => 'required|integer',
            'fecha'       => 'required|date',
            'empleado_id' => 'required|string|exists:empleados,_id',
        ];
    }

}
