<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacacioneRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|max:100',
            'fecha'       => 'required|date',
            'empleado_id' => 'required|string|exists:empleados,_id',
        ];
    }

}
