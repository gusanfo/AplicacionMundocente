<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class eventoAcademicoRequest extends Request {

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
			'areas' => 'required',
			'titulo' => 'required|between:4,60',
			'fecha_evento' => 'required',
			'enlace' => 'required|url'
		];
	}

}
