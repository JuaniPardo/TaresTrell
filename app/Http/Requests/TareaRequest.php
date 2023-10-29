<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|max:50',
            'descripcion' => 'required',
            'fecha_limite' => 'nullable|date',
        ];
    }
}
