<?php namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Convocatoria as Convocatoria;
use App\Departamento as Departamento;
use App\Ciudad as Ciudad;
use App\Area as Area;
=======
>>>>>>> pb/master
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConvocatoriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public function index(Request $request)
	{
		$convocatorias = Convocatoria::filterAndPaginate($request->get('areas'));
		return view('convocatorias.index',compact('convocatorias'));
=======
	public function index()
	{
		//
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
		return view('convocatorias.create',compact('departamentos','areas'));

	}

	public function getCiudades(Request $request,$id)
	{
		if($request->ajax() ){
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}

	}
=======
		//
	}

>>>>>>> pb/master
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	public function store(Requests\convocatoriaRequest $request)
	{

		$convocatoria = new Convocatoria;

		$convocatoria->departamento =  $request->input('departamento');
		$convocatoria->ciudad =  $request->input('ciudad');
		$convocatoria->universidad =  $request->input('universidad');
		$convocatoria->titulo =  $request->input('titulo');
		$convocatoria->areas =  implode(",",$request->input('areas'));
		$convocatoria->fecha_inicio =  $request->input('fecha_inicio');
		$convocatoria->fecha_finalizacion =  $request->input('fecha_finalizacion');
		$convocatoria->descripcion = $request->input('descripcion');
		$convocatoria->enlace = $request->input('enlace');
		$convocatoria->save();

		//$convocatoria = new Convocatoria;
		//$convocatoria->create($request->all());

		return redirect()->route('convocatorias.index');
	}


=======
	public function store()
	{
		//
	}

>>>>>>> pb/master
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
<<<<<<< HEAD

=======
		//
>>>>>>> pb/master
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
