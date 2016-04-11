<?php namespace App\Http\Controllers;

use App\Convocatoria as Convocatoria;
use App\Departamento as Departamento;
use App\Ciudad as Ciudad;
use App\Area as Area;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConvocatoriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$convocatorias = Convocatoria::filterAndPaginate($request->get('areas'));
		return view('convocatorias.index',compact('convocatorias'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


	public static function getconvocatoria()
	{
		$result = \DB::table('convocatorias')->limit(2)->orderBy('id', 'DESC')->get();
		return $result;
	}

	public function create()
	{
		$departamentos = Departamento::all();
		$areas = Area::all();
		return view('convocatorias.create',compact('departamentos','areas'));

	}

	public function getCiudades(Request $request,$id)
	{
		if($request->ajax() ){
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\convocatoriaRequest $request)
	{

		$convocatoria = new Convocatoria;

		$convocatoria->departamento =  $request->input('departamento');
		$convocatoria->ciudad =  $request->input('ciudad');
		$convocatoria->universidad =  $request->input('universidad');
		$convocatoria->titulo =  $request->input('titulo');
		$convocatoria->areas =  $request->input('areas');
		$convocatoria->fecha_inicio =  $request->input('fecha_inicio');
		$convocatoria->fecha_finalizacion =  $request->input('fecha_finalizacion');
		$convocatoria->descripcion = $request->input('descripcion');
		$convocatoria->enlace = $request->input('enlace');
		$convocatoria->save();

		//$convocatoria = new Convocatoria;
		//$convocatoria->create($request->all());

		return redirect()->route('convocatorias.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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
