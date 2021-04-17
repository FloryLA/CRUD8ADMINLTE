<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormArticulo extends FormRequest
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
            'codigo' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string', 'max:100'],
            'cantidad' => ['required', 'integer'],
            'precio' => ['required', 'numeric' ],
            'foto' => ['required','max:1000', 'mimes:jpeg,png,jpg'],
        ];
    }

    public function messages()
{
    return [
        'codigo.required'   => ':attribute es obligatorio.',
        'codigo.min'        => ':attribute debe contener mas caracteres.',
        'codigo.max'        => ':attribute debe contener max 6 letras.',

        'descripcion.required'   => ':attribute es obligatorio.',
        'descripcion.min'        => ':attribute debe contener mas de una letra.',
        'descripcion.max'        => ':attribute debe contener max 30 letras.',

        'cantidad.required'     => ':attribute es obligatorio.',
        'cantidad.integer'      => ':attribute debe ser entero.',

        'precio.required'     => ':attribute es obligatorio.',
        'precio.integer'      => ':attribute debe ser decimal.',

        'foto.required'     => ':attribute es obligatorio.',
        'foto.integer'      => ':attribute debe ser en jpeg,png,jpg .',
    ];
}




}
