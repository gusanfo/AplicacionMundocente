<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class convocatoriaRequest extends Request {

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
			'departamento' => 'required',
			'ciudad' => 'required',
			'universidad' => 'required',
			'fecha_inicio' => 'required|date',
			'fecha_finalizacion' => 'required|date',
			'areas' => 'required',
			'titulo' => 'required',
			'enlace' => 'required|url'
		];
	}

}
