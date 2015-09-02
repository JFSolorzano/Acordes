<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Preguntas;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\preguntas as validador;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class PreguntasCtrl extends Controller {

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

    public function inicio(Request $request){

        if (!\Entrust::can('crud-preguntas')) {

            return \Redirect::to('/');

        } else {

            $registros = Preguntas::buscar($request->get('parametros'))
                ->orderBy('pregunta','desc')
                ->paginate(6);

            return view('Center.preguntas.ver')
                ->with('registros',$registros);

        }

    }

    public function crear(){

        return view('Center.preguntas.crear');//el punto equivale a usar pleca
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Preguntas;

            $registro ->pregunta = \Input::get('pregunta');
            $registro ->respuesta = \Input::get('respuesta');
            $registro ->save();

            return \Redirect::route('adminPreguntas')
                ->with('alerta','La pregunta ha sido agregada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminPreguntasCrear' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function editar($id){

        $record = Hashids::decode($id);
        $registro = Preguntas::find($record[0]);

        return view('Center.preguntas.editar')
            ->with('registro',$registro);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
//                'pregunta' => array( 'required', 'string', 'min:10','unique:preguntas' ),
                'respuesta' => array( 'required', 'string', 'min:10' )
            );
            $this->validate( $request,$rules );

            $registro = Preguntas::find($id);
            $registro->pregunta = \Input::get('pregunta');
            $registro->respuesta = \Input::get('respuesta');
            $registro->save();

            return \Redirect::route('adminPreguntas')
                ->with('alerta','La pregunta ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'PreguntasCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Preguntas::find($id);
        $registro ->delete();

        return \Redirect::route('adminPreguntas')
            ->with('alerta','La pregunta ha sido eliminada con exito!');

    }

}
