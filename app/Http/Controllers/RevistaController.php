<?php namespace App\Http\Controllers;

use App\Revista as Revista;
<<<<<<< HEAD
use App\Departamento as Departamento;
use App\Ciudad as Ciudad;
use App\Universidad as Universidad;
use App\Area as Area;
use App\Http\Requests;
=======
use App\Http\Requests;
use App\Http\Requests\CreateRevistRequest;
>>>>>>> pb/master
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

<<<<<<< HEAD

=======
>>>>>>> pb/master
class RevistaController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public static function getNombre($ciudad)
	{
		$result = \DB::table('ciudades')->where('id', $ciudad)->pluck('nombre');

		return $result;

	}
	public static function getTotal($table)
	{
		$result = \DB::table($table)->count();

		return $result;

	}


	public function index(Request $request)
	{
		$revistas = Revista::filterAndPaginate($request->get('areas'));
		// $revistas = Revista::ciudad($request->get('id'));
		return view('revistas.index',compact('revistas'));
=======

	public function index(Request $request)
	{
		$revistas = Revista::all();

		//$revistas = Revista::nombre($request->get('nombre'));
        return view('revistas.index',compact('revistas'));
>>>>>>> pb/master
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
<<<<<<< HEAD
		$departamentos = Departamento::all();
		$areas = Area::all();
		return view('revistas.create',compact('departamentos','areas'));

	}
	public function getCiudades(Request $request,$id)
	{
		if($request->ajax() ){
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}

	}

	public function getUniversidades(Request $request,$id)
	{
		if($request->ajax() ){
			$universidades = Universidad::universidades($id);
			return response()->json($universidades);
		}

	}
=======
		return view('revistas.create');
	}

>>>>>>> pb/master
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public function store(Requests\RevistaRequest $request)
	{

		$revista = new Revista;
		$revista->departamento =  $request->input('departamento');
		$revista->ciudad =  $request->input('ciudad');
		$revista->universidad =  $request->input('universidad');
		$revista->titulo =  $request->input('titulo');
		$revista->tipoRevista = $request->input('tipoRevista');
		$revista->categoria =  $request->input('categoria');
		$revista->fechaRecepcion =  $request->input('fechaRecepcion');
		$revista->enlace = $request->input('enlace');
		$revista->areas =  implode(",",$request->input('areas'));
		$revista->save();
		//return Redirect::to('users')->with('notice', 'El usuario ha sido creado correctamente.');


		//	$revista = new Revista;
		//	$revista->create($request->all());
=======
	public function store(Requests\CreateRevistRequest $request)
	{

		$revista = new Revista;
		$revista->create($request->all());
>>>>>>> pb/master
		
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
