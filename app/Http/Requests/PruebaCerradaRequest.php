<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PruebaCerradaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'nullable|date',
            'jugadores_id' => 'required|exists:jugadores,id',
            'clubes_id' => 'required|exists:clubes,id',
            'usuarios_club_id' => 'nullable|exists:usuarios_clubs,id',
            'lugar' => 'nullable|string|max:255',
            'alojamiento_incluido' => 'sometimes|boolean',
        ];
    }
}
