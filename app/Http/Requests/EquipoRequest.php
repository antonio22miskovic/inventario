<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
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

            'nombre' => 'required',
            'modelo' => 'required',
            'marca' =>  'required',
            'codigo' => 'unique:equipos',
            'descripcion' =>  'required',
            'categoria' =>  'required'

        ];
    }

    public function messages()
    {
    return [

            'nombre.required' => 'por favor introduzca el nombre del equipo averiado',
            'modelo.required' => 'por favor introduzca el modelo del equipo' ,
            'marca.required' => 'introduzca la marca por favor',
            'codigo.unique' => 'el codigo del equipo ya existe' ,
            'descripcion.required' => 'por favor deja una descripcion' ,
            'categoria.required' => 'debe selecionar una categoria'

    ];
    }
}
