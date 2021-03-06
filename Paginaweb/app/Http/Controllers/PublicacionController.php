<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use App\Http\Requests\PublicacionUpdateRequest;
use App\Http\Requests\PublicacionCreateRequest;
use Auth;
use App\User;
use App\Area;
use App\Establecimiento;
use App\Funcionario;
use App\Grupo;
use App\Aplica;
use App\Lugar;
use Response;
use Carbon\Carbon;
use DB;
use Mail;

class PublicacionController extends Controller
{

    public function __construct(){

        Carbon::setLocale('es');    
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('funcionario', ['except' => ['show']]);
    }


    //
    public function index(){
        //return "index";
        //return view('publicacion.index');
        //$valor = Input::get('valor');
        if( Auth::check() ){
            //if( Auth::user()->estado == "activo" ){
                $publicaciones = Publicacion::where('estado', '=', 'activa')
                    ->paginate(15);
                    //->get()
                    //->all();
                $user = User::find(Auth::user()->id);
                $areas = Area::all();
                $establecimientos = Establecimiento::all();
                $lugares = Lugar::all();
                if ( $user->idrol === 2 ) {      
                    $funcionario = Funcionario::where('user_id', $user->id)
                        ->first();
                    $publicaciones = Publicacion::where('funcionario_id', $funcionario->id)
                        ->where('estado', '=', 'activa')
                        ->orderBy('fecha_publicacion', 'DESC')
                        ->paginate(15);
                        //->get()->all();
                    
                    //return $publicaciones;
                    //return $funcionario->publicacion;
                    //$publicaciones = $funcionario->publicaciones;
                    //return $publicaciones;
                   return view('publicacion.index', [
                        'areas' => $areas,
                        'usuario' => Auth::user(),
                        'publicaciones' => $publicaciones,
                        'establecimientos' => $establecimientos,
                        'lugares' => $lugares,
                        'user' => Auth::user(),
                    ]);
                } else if( $user->idrol === 1){
                    return redirect()->to('/busqueda');
                } else {
                    return view('publicacion.index', [
                        'publicaciones' => $publicaciones,
                        'user' => Auth::user(),
                    ]);
                }
            /*
            } else {
                return "Usuario inactivo";
            }
            */
        } else {
            return view('publicacion.index', [
                    'publicaciones' => $publicaciones,
            ]);
        }

        //return redirect()->to('/');

        /*
        $publicaciones = Publicacion::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('publicacion.index')->with('publicaciones', $publicaciones);
        return $valor;
        */
    }

    public function create(){
        //return "create";
        $areas = Area::all();
        //$lugares = DB::select('select d.nombre as departamento, m.nombre as ciudad, d.id as departamento_id , m.id as ciudad_id,d.tipo as tipo_departamento from lugares d,lugares m where d.id=m.ubicacion_id');
        $departamento=DB::select("select * from lugares where tipo='departamento'");
        $ciudad=DB::select("select * from lugares where tipo='municipio'");
        $areas_publicacion = array();
        $publicaciones = Publicacion::where('estado', '=', 'activa')
            ->paginate(15);
            //->get()
            //->all();
        $user = User::find(Auth::user()->id);
        $areas = Area::all();
        $establecimientos = Establecimiento::all();
        $lugares = Lugar::all();
        if ( $user->idrol === 2 ) {      
            $funcionario = Funcionario::where('user_id', $user->id)
                ->first();
            $publicaciones = Publicacion::where('funcionario_id', $funcionario->id)
                ->where('estado', '=', 'activa')
                ->orderBy('fecha_publicacion', 'DESC')
                ->paginate(15);
                //->get()->all();
            
            //return $publicaciones;
            //return $funcionario->publicacion;
            //$publicaciones = $funcionario->publicaciones;
            //return $publicaciones;
            $areas_publicacion = array();
            return view('publicacion.create', [
                'areas' => $areas,
                'usuario' => Auth::user(),
                'areas_publicacion' => $areas_publicacion,
                'publicaciones' => $publicaciones,
                'establecimientos' => $establecimientos,
                'lugares' => $lugares,
                  'departamentos' => $departamento,
                'ciudades'=>$ciudad,
                'user' => Auth::user(),
            ]);
       } else if (Auth::user()->idrol == 3) {
            $publicadores = Funcionario::all();
            return view('publicacion.create', [
                'areas' => $areas,
                'areas_publicacion' => $areas_publicacion,
                'departamentos' => $departamento,
                'ciudades'=>$ciudad,
                'user' => Auth::user(),        
                'publicadores' => $publicadores,
            ]);
        }
        //return "index";
    }

    public function store(PublicacionCreateRequest $request){
        //return "store";
        //return $request['tipo'] ." ". $request['fecha_cierre'];

        $ciudad_id=$request['lugar'];  
        $lugar = array();
        foreach ($ciudad_id as $id) {               
               array_push($lugar,DB::select("select d.nombre as departamento, m.nombre as ciudad from lugares d,lugares m where d.id=m.ubicacion_id AND m.id=".$id));               
        }          

        $id_funcionario = 0;
        if(Auth::user()->idrol == 2){
            $id_funcionario = Funcionario::where('user_id', '=', Auth::user()->id)
                ->first()
                ->id;
        } else if (Auth::user()->idrol == 3) {
            $id_funcionario = $request['publicador'];
        }

        $this->validate($request, [
            //'fecha_publicacion' => 'after:' . $today,
            'fecha_cierre' => 'after:' . $request['fecha_publicacion'],
        ]);

        $publicacion = Publicacion::create([
            'funcionario_id' => $id_funcionario,
            'nombre' => $request['nombre'],
            'resumen' => $request['resumen'],
            'descripcion' => $request['descripcion'],           
            'tipo' => $request['tipo'],
            'fecha_publicacion' => $request['fecha_publicacion'],
            'fecha_cierre' => $request['fecha_cierre'],
            'url' => $request['url'],
            'estado' => 'activa',
        ]);

       

        $this->crear_grupos($publicacion, $request);
        $ciudad_id=$request['lugar'];        
        $this->crear_aplica($ciudad_id,$publicacion);//son los municipios o ciudades
    
         

        $notificar_user=DB::table('grupos')->where('publicacion_id',$publicacion->id)
            ->join('intereses','intereses.area_id','=','grupos.area_id')
            ->join('docentes','docentes.id','=','intereses.docente_id')
            ->join('users','users.id','=','docentes.user_id')
            ->where('notificar',0)
            ->select('email','name')
            ->distinct()
            ->get();

          

            foreach ($notificar_user as $notificar) {
                 $data = array(
                        'notificar' => $notificar,
                        'publicacion'=>$publicacion,
                        'lugares'=>$lugar,
                );
                $this->enviar_correo('emails.nueva_publicacion',$data,'Notificación de tu área de interés');             
            } 
        Session::flash('mensaje', 'Publicacion creada');
        return Redirect::to('publicacion');        
    }
    public function crear_aplica($ciudad_id,$publicacion){
      
        if(!empty($ciudad_id)){
               foreach ($ciudad_id as $id) {
                    Aplica::create([
                    'lugar_id' => $id,
                    'publicacion_id' => $publicacion->id,
                ]);

                   
            }   
        }              
       
    }

    public function crear_grupos($publicacion, Request $request){
        $areas = $request['areas'];
        if(!empty($areas)){
            foreach ($areas as $area) {
                Grupo::create([
                    'publicacion_id' => $publicacion->id,
                    'area_id' => $area,
                ]);
            }            
        }
    }

    public function show($id){
        //return "show";
        $publicacion = Publicacion::find($id);
        $establecimiento = $publicacion->funcionario->establecimiento->nombre;
        $grupos = Grupo::where('publicacion_id', '=', $publicacion->id)->get();


        //$lugar = Lugar::find($publicacion->lugar_id)->first();
        //$fecha = $publicacion->fecha_publicacion->format('l \\of F Y h:i:s a');

        $aplicaciones = Aplica::where('publicacion_id', '=', $publicacion->id)->get()->all();

        $id_lugares = array();
        foreach ($aplicaciones as $aplicacion) {
            $id_lugares[] += Lugar::find($aplicacion->lugar_id)->id;
        }

        $lugares = Lugar::whereIn('id', $id_lugares)->get()->all();

        $mezcla = DB::table('grupos')
            ->where('publicacion_id', $publicacion->id)
            ->join('areas', 'areas.id', '=', 'grupos.area_id')
            ->distinct()->get();


        $mostrar = array(
            'publicacion' => $publicacion,
            'establecimiento' => $establecimiento,
            //'areas' => $areas,

            'fecha_publicacion' => $publicacion->fecha_publicacion,
            'fecha_cierre' => $publicacion->fecha_cierre,
            'lugares' => $lugares,
            'tipo' => $publicacion->tipo,
            'grupos' => $grupos,
            'mezcla' => $mezcla,
        );
        return Response::json($mostrar);
        //return $publicacion;
    }

    public function edit($id){
        //return "edit";
        $departamento=DB::select("select * from lugares where tipo='departamento'");
        $ciudad=DB::select("select * from lugares where tipo='municipio'");
        $publicacion = publicacion::find($id);
        $areas = Area::all();
        $grupos = Grupo::where('publicacion_id', $id)->get();
        $areas_publicacion = array();
        foreach ($grupos as $grupo) {
            $areas_publicacion[] = $grupo->area_id;
        }

        $ciudades_selecciondas=DB::select('select l.id, l.nombre from  aplicaciones a,lugares l where  a.publicacion_id='.$publicacion->id.' AND l.id=a.lugar_id');
        $lugares = Lugar::all();

        $fecha_publicacion = $publicacion->fecha_publicacion;
        $fecha_cierre = $publicacion->fecha_cierre;

        return view('publicacion.edit', [
            'publicacion' => $publicacion,
            'areas' => $areas,
            'areas_publicacion' => $areas_publicacion,
            'areas_usuario' => $areas_publicacion,
            'user' => Auth::user(),
            'lugares' => $lugares,
            'departamentos' => $departamento,
            'ciudades'=>$ciudad,
            'verificar'=>true,
            'ciudades_selecciondas'=>$ciudades_selecciondas,
            'fecha_publicacion' => $fecha_publicacion,
            'fecha_cierre' => $fecha_cierre,
        ]);        
    }

    public function update($id, Request $request){
        //return "update";
         $this->validate($request, [
            //'fecha_publicacion' => 'after:' . $today,
            'fecha_cierre' => 'after:' . $request['fecha_publicacion'],
        ]);
       
        $ciudad_id=$request['lugar'];  

        $publicacion = Publicacion::find($id);
     
        $publicacion->fill($request->all());
        $publicacion->save();
        Aplica::where('publicacion_id',$publicacion->id)->delete();
        $this->crear_aplica($ciudad_id,$publicacion);
        Grupo::where('publicacion_id', $id)->delete();
        $this->crear_grupos($publicacion, $request);

        Session::flash('mensaje', 'Publicacion Editada');
        return Redirect::to('publicacion');
    }

    public function borrados(){
        //$publicaciones = Publicacion::all();
        /*$publicaciones = Publicacion::where('estado', '=', 'inactiva')
            ->get()
            ->all();
            */
        if( Auth::check() ){
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::all();
            $publicaciones = Publicacion::where('estado', '=', 'inactiva')
                ->paginate(15);
                //->get()
                //->all();
            if ( $user->idrol === 2) {      
                $funcionario = Funcionario::where('user_id', $user->id)
                    ->first();
                $publicaciones = Publicacion::where('funcionario_id', $funcionario->id)
                    ->where('estado', '=', 'inactiva')
                    ->orderBy('fecha_publicacion', 'DESC')
                    ->paginate(15);
                    //->get()
                    //->all();
                
                //return $publicaciones;
                //return $funcionario->publicacion;
                //$publicaciones = $funcionario->publicaciones;
                //return $publicaciones;
               return view('publicacion.borrados', [
                    'areas' => $areas,
                    'usuario' => Auth::user(),
                    'publicaciones' => $publicaciones,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                    'user' => Auth::user(),
                ]);
            } else if($user->idrol === 3){
                //return redirect()->to('publicacion/borrados');
                return view('publicacion.borrados', [
                    'areas' => $areas,
                    'user' => Auth::user(),
                    'publicaciones' => $publicaciones,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                ]);
            }else {
                return redirect()->to('/busqueda');
            }
        }
        return redirect()->to('/');
    }

    public function recuperar($id){
         $publicacion = Publicacion::find($id);
         //return $publicacion;
            $publicacion->update([
                'estado' => 'activa',
            ]);

        Session::flash('mensaje', 'Publicacion recuperada');
        return Redirect::to('publicacion/borrados');
    }

    public function destroy($id){
    	//return "destroy";

        /*
        Publicacion::destroy($id);
        Grupo::where('publicacion_id', $id)->delete();
        */
        $publicacion = Publicacion::find($id);
            $publicacion->update([
                'estado' => 'inactiva',
            ]);

        Session::flash('mensaje', 'Publicacion borrada');
        return Redirect::to('publicacion');
    }

    public static function enviar_correo($vista,$data,$msj){       
        Mail::later(5, $vista, $data, function($message) use ($data, $msj) {      
            $message->from('usuariosayuda@mundocente.com', 'Mundocente');
            $message->to($data['notificar']->email)->subject($msj);
        });
    }
}