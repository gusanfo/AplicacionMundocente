<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class userRequest extends Request {

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
			'name' => 'required|max:50',
			'email' => 'required|email|max:100|unique:users',
			'password' => 'required|confirmed|min:6',
			'telefono' => 'required|unique:users|digits_between:10,13',
			'tipoUser' => 'required'
		];
	}

}
