<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Redes;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\redes as validador;

use Illuminate\Http\Request;


class RedesCtrl extends Controller {

    protected $_validador;

    public function __construct(validador $validador){

        $this->middleware('auth');
        $this->_validador = $validador;
    }

    public function inicio(Request $request){

        if (!\Entrust::can('crud-redes')) {

            return \Redirect::to('/');

        } else {

            $registros = Redes::buscar($request->get('parametros'))
                ->orderBy('nombre','desc')
                ->paginate(6);

            return view('Center.redes.ver')
                ->with('registros',$registros);

        }

    }

    public function crear(){

        return view('Center.redes.crear');//el punto equivale a usar pleca
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Redes;

            $registro ->nombre = \Input::get('nombre');
            $registro ->link = \Input::get('link');
            $registro ->save();

            return \Redirect::route('adminRedes')
                ->with('alerta','La red social ha sido agregada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminRedesCrear' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function editar($id){

        $registro = Redes::find($id);

        return view('Center.redes.editar')
            ->with('registro', $registro);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombre' => array( 'required', 'string', 'min:5'),
                'link' => array( 'required', 'string', 'min:10')
            );
            $this->validate( $request,$rules );

            $registro = Redes::find($id);
            $registro ->nombre = \Input::get('nombre');
            $registro ->link = \Input::get('link');
            $registro ->save();

            return \Redirect::route('adminRedes')
                ->with('alerta','La redes sociales ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'RedesCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Redes::find($id);
        $registro ->delete();

        return \Redirect::route('adminRedes')
            ->with('alerta','La red social ha sido eliminada con exito!');

    }

}
