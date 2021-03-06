<?php namespace App\Http\Controllers;

use App\Convocatoria as Convocatoria;
use App\Ciudad as Ciudad;
use App\Area as Area;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class ConvocatoriaController extends Controller {


	public static function getNombre($ciudad)
	{
		$result = \DB::table('ciudades')->where('id', $ciudad)->pluck('nombre');

		return $result;

	}	
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
			$convocatorias = Convocatoria::filterAndPaginate($request->get('type'));
			if($request->get('areas') != '' || $request->get('universidad') != '' || $request->get('ciudad') != ''){
			 //:::::::. Filtro Avanzado ::::::::::.
				$convocatorias = Convocatoria::filterAdvanced($request->get('areas'),$request->get('ciudad'),$request->get('universidad'));
			}
		}
		elseif(self::tipo_usuario()=="Buscar"){
			
			if($request->get('type') == ''){				
				$convocatorias = Convocatoria::filtradoAreasInteres();
			}else{
				$convocatorias = Convocatoria::filterAndPaginate2($request->get('type'));
					
			}
				if($request->get('areas') != '' || $request->get('universidad') != '' || $request->get('ciudad') != ''){
 //:::::::. Filtro Avanzado ::::::::::.
			$convocatorias = Convocatoria::filterAdvanced($request->get('areas'),$request->get('ciudad'),$request->get('universidad'));
					
				}

		}

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

		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();
		return view('convocatorias.create',compact('areas','areas2'));

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
	public function store(Requests\convocatoriaRequest $request)
	{

		$convocatoria = new Convocatoria;
		$convocatoria->user_id = self::getId();
		$convocatoria->universidad = self::getUniverisity() ;
		$convocatoria->ciudad =  $request->input('ciudad');	
		$convocatoria->titulo =  $request->input('titulo');
		$convocatoria->areas =  $request->input('areas');
		$convocatoria->fecha_inicio =  $request->input('fecha_inicio');
		$convocatoria->fecha_finalizacion =  $request->input('fecha_finalizacion');
		$convocatoria->descripcion = $request->input('descripcion');
		$convocatoria->enlace = $request->input('enlace');
		$convocatoria->save();

		//$convocatoria = new Convocatoria;
		//$convocatoria->create($request->all());

		$emails = \DB::table('users')->where('areas','LIKE',$request->input('areas'))->where('notificar','1')->lists('email');
		$data = array();

		Mail::send('emails.notificacionC', $data, function ($message) use ($emails)
		{
			foreach ($emails as $email){

				$message->to($email)->subject('Convocatoria en las areas de Interes');
			}
		});

		\Session::flash('flash_message','Ha sido creada!');
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
		$convocatoria = Convocatoria::findOrFail($id);
		$areas = Area::all();
		$areas2 = \DB::table('areas')->where('tipo',null)->get();

		return view('convocatorias.edit',compact('convocatoria','areas','areas2'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$convocatoria = Convocatoria::findOrFail($id);

		$convocatoria->ciudad =	$request->input('ciudad');
		$convocatoria->titulo =	$request->input('titulo');
		$convocatoria->areas =  $request->input('areas');
		$convocatoria->fecha_inicio =	$request->input('fecha_inicio');
		$convocatoria->fecha_finalizacion =	$request->input('fecha_finalizacion');
		$convocatoria->descripcion  =  $request->input('descripcion');
		$convocatoria->enlace =	$request->input('enlace');

		$convocatoria->save();

		$message = 'Ha sido modificado';
		Session::flash('flash_messageW', $message);
		return redirect()->route('convocatorias.index');
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
		Convocatoria::destroy($id);

		$message = 'Fue  eliminado de nuestros registros';
		Session::flash('flash_messageD', $message);

		return redirect()->route('convocatorias.index');
	}

}
