<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JugadoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'pierna_habil' => 'required',
			'fecha_nacimiento' => 'required',
			'altura' => 'required',
			'peso' => 'required',
			'descripcion_jugador' => 'nullable|string|max:255',
			'users_id' => $this->isMethod('post') ? 'required' : 'prohibited',
			'path_foto_jugador' => 'prohibited',
        ];
    }
}
