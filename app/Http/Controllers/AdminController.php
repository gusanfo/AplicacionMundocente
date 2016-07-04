<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Universidad as Universidad;
use App\Area as Area;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$universidades = Universidad::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();

		$users = User::filterAndPaginate($request->get('name'));
		return view('admin.index',compact('users','universidades','areas2'));
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
	public function store( )//Requests\AreaRequest $request
	{


		$univ = Input::get('u');
		if ( ! empty ($univ))
		{
			\DB::table('universidades')->insert(
				['nombre' => Input::get('u') ]
			);
			\Session::flash('flash_message','Ha sido creada!');
		}
		$value =  Input::get('tipo');
		if ( ! empty ($value))
		{
			\DB::table('areas')->insert(
				['nombre' =>Input::get('tipo'), 'tipo' => Input::get('nombre') ]
			);
			\Session::flash('flash_message','Ha sido creada!');
		}

		/*$univ = $requestU->input('nombre');
		if ( ! empty ($univ))
		{
			\DB::table('universidades')->insert(
				['nombre' => $requestU->input('nombre') ]
			);
		}

		$value =  $request->input('nombre');
		if ( ! empty ($value))
		{
			\DB::table('areas')->insert(
				['nombre' => $request->input('tipo'), 'tipo' => $request->input('nombre') ]
			);
		}
*/




		return redirect()->route('admin.index');

	}
	public static  function post_area(Requests\AreaRequest $request)
	{
		\DB::table('areas')->insert(
			['nombre' => $request->input('areas'), 'tipo' => $request->input('tipo') ]
		);
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}
	public function addArea(Request $request)
	{
		$value = 0;

	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		\DB::table('users')
			->where('id', $id)
			->update(['estado' => 1]);

		$data = array();

		$email = \DB::table('users')->where('id',$id)->pluck('email');


		Mail::send('emails.template', $data, function ($message) use ($email)
		{
				$message->to($email)->subject('Activada cuenta Mundocente');

		});
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		$message = 'Fue  eliminado de nuestros registros';
		Session::flash('flash_message', $message);

		return redirect()->route('admin.index');
	}

}
