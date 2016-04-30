<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User as User ;
use Illuminate\Support\Facades\Session;


class userController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	public static function getId()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('id');
		return $result;

	}
	
	public static function getInactivar()
	{
		\DB::table('users')
			->where('id', self::getId())
			->update(['estado' => 0]);

		return redirect('/auth/login');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		return view('user.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$user = User::findOrFail($id);

		$user->name=$request->input('name');
		$user->email=$request->input('email');
		$user->telefono =  $request->input('telefono');
		$user->estado = '1';
		//if ($request->input('tipoUser'))
		//	$user->tipoUser =  $request->input('tipoUser');
		//if ($request->input('password'))
		//	$user->password=Hash::make($request->input('password'));

		$user->save();

		return redirect('');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
