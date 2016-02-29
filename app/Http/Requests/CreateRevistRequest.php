<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRevistRequest extends Request {

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
			'universidad' => 'required|between:4,20|alpha',
			'nombre' => 'required|between:4,20|alpha',
			'fecha_limite' => 'required|date',
			'enlace' => 'required|url'
		];
	}

}
