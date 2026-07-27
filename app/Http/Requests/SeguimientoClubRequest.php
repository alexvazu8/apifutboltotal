<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoClubRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'clubes_id' => 'required|exists:clubes,id',
            'contacto_email' => 'nullable|email',
            'contacto_telefono' => 'nullable|string|max:50',
            'nombre_persona_contacto_club' => 'nullable|string|max:255',
            'jugadores_id' => 'nullable|exists:jugadores,id',
            'fecha' => 'nullable|date',
            'texto' => 'nullable|string',
            'estado' => 'nullable|in:Mensaje enviado,En Seguimiento,Tiene Prueba Abierta,Tiene Prueba Cerrada,Quieren Ficharlo,No Hay respuestas,No lo necesitan',
        ];
    }
}
