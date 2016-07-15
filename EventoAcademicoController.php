<?php namespace App\Http\Controllers;


use App\EventoAcademico as EventoAcademico;
use App\Ciudad as Ciudad;
use App\Universidad as Universidad;
use App\Area as Area;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class EventoAcademicoController extends Controller {

	public static function tipo_usuario()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('tipoUser');
		return $result;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(self::tipo_usuario()=="Publicar"){
			$eventosAcademicos = EventoAcademico::filterAndPaginate($request->get('type'));
			if($request->get('areas') != '' || $request->get('universidad') != '' || $request->get('ciudad') != ''){		
			 //:::::::. Filtro Avanzado ::::::::::.
			$eventosAcademicos = EventoAcademico::filterAdvanced($request->get('areas'),$request->get('ciudad'),$request->get('universidad'));
			}
		}
		elseif(self::tipo_usuario()=="Buscar"){
			
			if($request->get('type') == ''){				
				$eventosAcademicos = EventoAcademico::filtradoAreasInteres();
			}else{

			$eventosAcademicos = EventoAcademico::filterAndPaginate2($request->get('type'));
			
			}
			 //:::::::. Filtro Avanzado ::::::::::.
			if($request->get('areas') != '' || $request->get('universidad') != '' || $request->get('ciudad') != ''){		
			
				$eventosAcademicos = EventoAcademico::filterAdvanced($request->get('areas'),$request->get('ciudad'),$request->get('universidad'));
			}

		}
		
		return view('eventoAcademico.index',compact('eventosAcademicos'));
	}

public static function getId()
	{
		$value = Session::get('email');
		$result = \DB::table('users')->where('email',$value )->pluck('id');
		return $result;

	}

public static function getNombre($ciudad)
	{
		$result = \DB::table('ciudades')->where('id', $ciudad)->pluck('nombre');

		return $result;

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public static function getevento()
	{
		$result = \DB::table('eventos_academicos')->limit(2)->orderBy('id', 'DESC')->get();
		return $result;
	}

	public function create()
	{
		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();
		return view('eventoAcademico.create',compact('areas','areas2'));
	}

	public function getCiudades(Request $request,$id)
	{
		if($request->ajax() ){
			$ciudades = Ciudad::ciudades($id);
			return response()->json($ciudades);
		}

	}
	public static function getUniversity()
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
	public function store(Requests\eventoAcademicoRequest $request)
	{
		$eventoAcademico = new EventoAcademico;
		$eventoAcademico->user_id = self::getId();
		$eventoAcademico->universidad = self::getUniversity();
		$eventoAcademico->ciudad =  $request->input('ciudad');
		$eventoAcademico->titulo =  $request->input('titulo');
		$eventoAcademico->areas =  implode(",",$request->input('areas'));
		$eventoAcademico->fecha_inicio =  $request->input('fecha_inicio');
		$eventoAcademico->fecha_fin =  $request->input('fecha_fin');
		$eventoAcademico->enlace = $request->input('enlace');
		$eventoAcademico->save();

		//$eventoAcademico = new EventoAcademico;
		//$eventoAcademico->create($request->all());

		$emails = \DB::table('users')->where('areas','LIKE',$request->input('areas'))->where('notificar','1')->lists('email');

		//dd($emails);

		$data = array();

		Mail::send('emails.notificacionE', $data, function ($message) use ($emails)
		{
			foreach ($emails as $email){

				$message->to($email)->subject('Evento Academico en las areas de Interes');
			}
		});

		\Session::flash('flash_message','Ha sido creada!');
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
		$eventoAcademico = EventoAcademico::findOrFail($id);
		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();
		return view('eventoAcademico.edit',compact('eventoAcademico','areas','areas2'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$eventoAcademico = EventoAcademico::findOrFail($id);

		$eventoAcademico->titulo =	$request->input('titulo');
		$eventoAcademico->areas =  $request->input('areas');
		$eventoAcademico->ciudad =	$request->input('ciudad');		
		$eventoAcademico->fecha_inicio =$request->input('fecha_inicio');
		$eventoAcademico->fecha_fin =	$request->input('fecha_fin');		
		$eventoAcademico->enlace =	$request->input('enlace');

		$eventoAcademico->save();

		$message = 'Ha sido modificado';
		Session::flash('flash_messageW', $message);
		return redirect()->route('eventoAcademico.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//dd("Eliminado: ".$id);
		EventoAcademico::destroy($id);

		$message = 'Fue  eliminado de nuestros registros';
		Session::flash('flash_messageD', $message);

		return redirect()->route('eventoAcademico.index');
	}

}
