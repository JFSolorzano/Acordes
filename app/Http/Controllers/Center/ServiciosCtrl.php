<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Servicios;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\servicios as validador;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use Request as BRequest;

class ServiciosCtrl extends Controller {

    protected $_validador;

    public function __construct(validador $validador){

        $this->middleware('auth');
        $this->_validador = $validador;
    }

    public function inicio(Request $request){

        if (!\Entrust::can('crud-servicios')) {

            return \Redirect::to('/');

        } else {

            $registros = Servicios::buscar($request->get('parametros'))
                ->orderBy('nombre','desc')
                ->paginate(6);

            return view('Center.servicios.ver')
                ->with('registros',$registros);

        }

    }

    public function crear(){

        return view('Center.servicios.crear');//el punto equivale a usar pleca
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Servicios;

            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            $imagen = BRequest::file('imagen');
            $extension = $imagen->getClientOriginalExtension();
            Storage::disk('image')->put($imagen->getFilename().'.'.$extension,  File::get($imagen));

            $registro ->imagen = $imagen->getFilename().'.'.$extension;
            $registro ->estado = \Input::get('estado');
            $registro ->save();

            return \Redirect::route('adminServicios')
                ->with('alerta','El servicio ha sido agregado con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminServiciosCrear' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function editar($id){

        $registro = Servicios::find($id);

        return view('Center.servicios.editar')
            ->with('registro', $registro);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombre' => array( 'required', 'string', 'min:5','unique:servicios,nombre,'. $id),
                'descripcion' => array( 'required', 'string', 'min:10')
            );
            $this->validate( $request,$rules );

            $registro = Servicios::find($id);
            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            $imagen = BRequest::file('imagen');
            $extension = $imagen->getClientOriginalExtension();
            Storage::disk('image')->put($imagen->getFilename().'.'.$extension,  File::get($imagen));

            $registro ->imagen = $imagen->getFilename().'.'.$extension;
            $registro ->estado = \Input::get('estado');
            $registro ->save();

            return \Redirect::route('adminServicios')
                ->with('alerta','El servicio ha sido modificado con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'ServiciosCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Servicios::find($id);
        $registro ->delete();

        return \Redirect::route('adminServicios')
            ->with('alerta','El servicio ha sido eliminado con exito!');

    }

}
