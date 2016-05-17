<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RevistaRequest extends Request {

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
			'tipoRevista' => 'required',			
			'areas' => 'required',
			'fechaRecepcion' => 'date_format:Y-m-d|after:yesterday',
			'titulo' => 'required|between:4,50',			
			'enlace' => 'required|url'
		];
	}

}
