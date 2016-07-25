<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class PublicacionCreateRequest extends Request
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
        $today = Carbon::now();
        return [
            //
            'nombre' => 'required|max:80',
            'resumen' => 'required|max:200',
            'lugar' => 'required',
            'fecha_cierre' => 'after:' . $today,
        ];
    }
}
