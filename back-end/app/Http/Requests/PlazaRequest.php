<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlazaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'    => 'required|string|max:120',
            'patron_id' => 'required|string|exists:patrons,_id',
        ];
    }

}
