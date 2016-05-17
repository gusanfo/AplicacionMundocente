<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User as User ;
use App\Area as Area;
use App\Universidad;
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
	/*
	public  function getInactivar($id)
	{
		\DB::table('users')
			->where('id', $id)//self::getId()
			->update(['estado' => 0]);

		return redirect('/auth/login');
		//url('/auth/logout')

	}*/
	public  function getInactivar($id)
	{

		$user = User::findOrFail($id);
		$user->estado = '0';
		return redirect('/auth/login');
		//url('/auth/logout')

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
		$universidades = Universidad::all();
		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();

		return view('user.edit',compact('user','universidades','areas','areas2'));
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

		$value = $request->input('password');
		if ( ! empty ($value))
		{
			$user->password =  bcrypt($value);
		}


		if($request->input('tipoUser') === 'Buscar'){

			$user->universidad = null;
			$user->cargo = null;
			if($request->input('areas') != null){
				$user->areas =  implode(",",$request->input('areas'));
			}


		}else{

			$user->universidad =  $request->input('universidad');
			$user->cargo = $request->input('cargo');
			$user->areas = null;

		}

		$user->estado = $request->input('estado');
		$user->notificar =  $request->input('notificar');

		$user->save();

		if($request->input('estado') == 0){
			return redirect('/auth/logout');
		}else{
			return redirect('');
		}

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
