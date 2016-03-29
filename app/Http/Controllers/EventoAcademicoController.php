<?php namespace App\Http\Controllers;


use App\EventoAcademico as EventoAcademico;
use App\Departamento as Departamento;
use App\Ciudad as Ciudad;
use App\Universidad as Universidad;
use App\Area as Area;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



class EventoAcademicoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$eventosAcademicos = EventoAcademico::filterAndPaginate($request->get('areas'));
		return view('eventoAcademico.index',compact('eventosAcademicos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamentos = Departamento::all();
		$areas = Area::all();
		return view('eventoAcademico.create',compact('departamentos','areas'));
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
	public function store(Requests\eventoAcademicoRequest $request)
	{
		$eventoAcademico = new EventoAcademico;

		$eventoAcademico->departamento =  $request->input('departamento');
		$eventoAcademico->ciudad =  $request->input('ciudad');
		$eventoAcademico->universidad =  $request->input('universidad');
		$eventoAcademico->titulo =  $request->input('titulo');
		$eventoAcademico->areas =  implode(",",$request->input('areas'));
		$eventoAcademico->fecha_evento =  $request->input('fecha_evento');
		$eventoAcademico->enlace = $request->input('enlace');
		$eventoAcademico->save();

		//$eventoAcademico = new EventoAcademico;
		//$eventoAcademico->create($request->all());

		return redirect()->route('eventoAcademico.index');
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
