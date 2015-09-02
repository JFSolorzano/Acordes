<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\User;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\empleados as validador;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use Request as BRequest;
use Vinkla\Hashids\Facades\Hashids;

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

            $registros = \DB::table('users')
                ->join('role_user','users.id','=','user_id')
                ->join('roles','roles.id','=','role_id')
                ->where('users.type','=',0)
                ->select('users.id AS id_usuario', 'users.name AS nombre_usuario', 'users.email', 'users.avatar', 'roles.display_name')
                ->orderBy('roles.display_name','asc')
                ->paginate(6);

            return view('Center.empleados.ver')
                ->with('registros',$registros);

        }

    }

    /**
     * Funcion que retorna la vista de creacion de nuevas promociones
     */
    public function crear(Request $request){

        $roles = \DB::table('roles')->get();

        return view('Center.empleados.crear')
            ->with('roles',$roles);

    }

    public function insertar(){

        $inputs = \Input::all();

//        dd($inputs);

        try {

//            $this->_validador->validate( $inputs );

            $registro = new User;

            if(\Input::get('avatar')){
                $avatar = BRequest::file('foto');
                $extension = $avatar->getClientOriginalExtension();
                $avatar_name = preg_replace('/\s*/', '', \Input::get('nombres'));
                $avatar_name = strtolower($avatar_name);
                Storage::disk('image')->put($avatar_name.'.'.$extension,  File::get($avatar));
                $registro ->avatar = $avatar_name.'.'.$extension;
            }
            $registro ->name = \Input::get('nombres');
            $registro ->password = \Hash::make(\Input::get('password'));
            $registro ->type = 0;
            $registro ->email = \Input::get('email');
            $registro ->save();

            \DB::table('role_user')->insert([
               'user_id' => $registro ->id,
                'role_id' => \Input::get('rol')
            ]);

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

        $record = Hashids::decode($id);
        $registro = User::find($record[0]);

        $roles = \DB::table('roles')->get();

        return view('Center.empleados.editar')
            ->with('registro',$registro)->with('roles', $roles);

    }

    /**
     * Funcion que hace el proceso de reingreso de captura y guardado de datos, una vez finalizado redirije a la vista del inicio,
     * enviando un mensaje de alerta
     * @param $id
     */
    public function actualizar($id, Request $request){

        try {

//            $rules = array(
//                'nombres' => array( 'required', 'string', 'min:10' ),
//                'apellidos' => array( 'required', 'string', 'min:10' ),
//                'biografia' => array( 'required', 'string', 'min:50'),
//                'foto' => array('image','image_size:>=300,>=300')
//            );
//            $this->validate( $request,$rules );

            $registro = User::find($id);

//            dd($registro);

            if(\Input::get('avatar')){
                $avatar = BRequest::file('foto');
                $extension = $avatar->getClientOriginalExtension();
                $avatar_name = preg_replace('/\s*/', '', \Input::get('nombres'));
                $avatar_name = strtolower($avatar_name);
                Storage::disk('image')->put($avatar_name.'.'.$extension,  File::get($avatar));
                $registro ->avatar = $avatar_name.'.'.$extension;
            }
            $registro ->name = \Input::get('nombres');

            if(\Input::get('password')){
                $registro ->password = \Hash::make(\Input::get('password'));
            }

            $registro ->type = 0;
            $registro ->email = \Input::get('email');
            $registro ->save();

            \DB::table('role_user')
                ->where('user_id',$registro ->id)
                ->update(['role_id' => \Input::get('rol')]);

            return \Redirect::route('adminEmpleados')
                ->with('alerta','El integrante ha sido modificado con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'EquipoCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = User::find($id);
        $registro ->delete();

        return \Redirect::route('adminEmpleados')
            ->with('alerta','El empleado ha sido eliminado con exito!');

    }

}
