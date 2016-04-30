<?php namespace App\Http\Controllers;

use App\Revista as Revista;

use App\Ciudad as Ciudad;
use App\Universidad as Universidad;
use App\Area as Area;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RevistaController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public static function getNombre($ciudad)
	{
		$result = \DB::table('ciudades')->where('id', $ciudad)->pluck('nombre');

		return $result;

	}
	public static function getrevista()
	{
		$result = \DB::table('revistas')->limit(2)->orderBy('id', 'DESC')->get();
		return $result;
	}

	public static function getTotal($table)
	{
		$result = \DB::table($table)->count();
		return $result;

	}

	public static function getusers($table)
	{
		$resultado = \DB::table('users')->count();
		return $resultado;
	}
	public static function tipo_usuario()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('tipoUser');
		return $result;

	}

	public function index(Request $request)
	{
		if(self::tipo_usuario()=="Publicar"){
			$revistas = Revista::filterAndPaginate($request->get('type'));
		}
		elseif(self::tipo_usuario()=="Buscar"){
			$revistas = Revista::filterAndPaginate2($request->get('type'));
		}

		return view('revistas.index',compact('revistas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$universidades = Universidad::all();
		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();

		return view('revistas.create',compact('universidades','areas','areas2'));

	}
	public function getCiudades(Request $request,$id)
	{
		if($request->ajax() ){
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}

	}
	public static function getType()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('tipoUser');
		return $result;

	}

	public static function getId()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('id');
		return $result;

	}
	public static function getUniverisity()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('universidad');
		return $result;

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\RevistaRequest $request)
	{

		$revista = new Revista;
		$revista->user_id = self::getId();
		$revista->universidad = self::getUniverisity();
		$revista->titulo =  $request->input('titulo');
		$revista->tipoRevista = $request->input('tipoRevista');
		$revista->categoria =  $request->input('categoria');
		$revista->fechaRecepcion =  $request->input('fechaRecepcion');
		$revista->enlace = $request->input('enlace');
		$revista->areas =  implode(",",$request->input('areas'));
		$revista->save();

		\Session::flash('flash_message','Ha sido creada!');
   		return redirect()->route('revistas.index');
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
