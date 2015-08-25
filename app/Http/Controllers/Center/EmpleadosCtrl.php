<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Cargos;
use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Empleados;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\empleados as validador;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use Request as BRequest;

class EmpleadosCtrl extends Controller {

    /**
     * Variable protegida que hara referencia a la clase de validacion
     * -> RocketCandy\Services\Validation\servicios
     */
    protected $_validador;

    /**
     * Constructor de la nueva instancia del controlador
     * @param validador $validador - registro de la clase RocketCandy\Services\Validation\servicios
     */
    public function __construct(validador $validador){

        $this->middleware('auth');//Verificacion de la autenticidad de la sesion
        $this->_validador = $validador;//asignacion de la clase a la variable protegida
    }

    /**
     * Funcion que retorna la vista de inicio del modulo de Equipo, esta retorna la vista con los datos
     * @param Request $request - variable interna que controla los elementos de la vista para obtner su valor
     * @return $this
     */
    public function inicio(Request $request){

        if (!\Entrust::can('crud-empleados')) {

            return \Redirect::to('/');

        } else {

            $registros = Empleados::buscar($request->get('parametros'))
                ->orderBy('nombres','desc')
                ->paginate(6);
            $cargos = Cargos::all(['id','nombre','descripcion']);
            return view('Center.empleados.ver')
                ->with('registros',$registros)
                ->with('cargos',$cargos);

        }

    }

    /**
     * Funcion que retorna la vista de creacion de nuevas promociones
     */
    public function crear(Request $request){
        $cargos = Cargos::all(['id','nombre','descripcion']);
        return view('Center.empleados.crear')
            ->with('cargos',$cargos);//el punto equivale a usar pleca
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Empleados;

            $foto = BRequest::file('foto');
            $extension = $foto->getClientOriginalExtension();
            Storage::disk('image')->put($foto->getFilename().'.'.$extension,  File::get($foto));

            $registro ->foto = $foto->getFilename().'.'.$extension;
            $registro ->nombres = \Input::get('nombres');
            $registro ->apellidos = \Input::get('apellidos');
            $registro ->cargo = \Input::get('cargo');
            $registro ->biografia = \Input::get('biografia');
            $registro ->save();

            return \Redirect::route('adminEmpleados')
                ->with('alerta','El integrante ha sido agregado con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminEmpleadosCrear' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    /**
     * Funcion que retorna la vista de edicion de registro
     * @param $id - parametro que contiene el id del registro a editar
     */
    public function editar($id){

        $registro = Empleados::find($id);
        $cargos = Cargos::all(['id','nombre','descripcion']);
        return view('Center.empleados.editar')
            ->with('cargos',$cargos)
            ->with('registro',$registro);

    }

    public function ver($id){

        $registro = Empleados::find($id);
        $cargos = Cargos::all(['id','nombre','descripcion']);
        return view('Center.empleados.mas')
            ->with('cargos',$cargos)
            ->with('registro',$registro);

    }

    /**
     * Funcion que hace el proceso de reingreso de captura y guardado de datos, una vez finalizado redirije a la vista del inicio,
     * enviando un mensaje de alerta
     * @param $id
     */
    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombres' => array( 'required', 'string', 'min:10' ),
                'apellidos' => array( 'required', 'string', 'min:10' ),
                'biografia' => array( 'required', 'string', 'min:50'),
                'foto' => array('image','image_size:>=300,>=300')
            );
            $this->validate( $request,$rules );

            $registro = Empleados::find($id);
            if($archivo = BRequest::file('foto')) {//si se ingreso una imagen la guarda si no matiene la anterior
                $extension = $archivo->getClientOriginalExtension();
                Storage::disk('local')->put($archivo->getFilename() . '.' . $extension, File::get($archivo));
                $registro->foto = $archivo->getFilename().'.'.$extension;
            }
            $registro->nombres = \Input::get('nombres');
            $registro->apellidos = \Input::get('apellidos');
            $registro->cargo = \Input::get('cargo');
            $registro->biografia = \Input::get('biografia');
            $registro->save();

            return \Redirect::route('adminEmpleados')
                ->with('alerta','El integrante ha sido modificado con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'EquipoCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Empleados::find($id);
        $registro ->delete();

        return \Redirect::route('adminEmpleados')
            ->with('alerta','El integrante ha sido eliminado con exito!');

    }

}
