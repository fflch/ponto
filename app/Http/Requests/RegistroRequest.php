<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Place;
use App\Models\Grupo;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'codpes'   => ['required','integer',Rule::in(Grupo::allowedCodpes())],
            'foto'     => 'required',
            'place_id' => ['required','integer',Rule::in(Place::pluck('id')->toArray())],
        ];

    }

    public function messages()
    {
        return [
            'codpes.required' => 'Número USP obrigatório',
            'codpes.*' => 'Número USP não permitido',
            'foto.required' => 'Foto Obrigatória',
        ];
    }
}