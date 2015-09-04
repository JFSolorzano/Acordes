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
use Vinkla\Hashids\Facades\Hashids;

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

            if(\Input::get('imagen')){
                $imagen = BRequest::file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $nombre_imagen = preg_replace('/\s*/', '', \Input::get('nombre'));
                $nombre_imagen = strtolower($nombre_imagen);
                Storage::disk('image')->put($nombre_imagen.'.'.$extension,  File::get($nombre_imagen));
                $registro ->imagen = $nombre_imagen.'.'.$extension;
            }

            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            $registro-> estado = \Input::get('estado');
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

        $record = Hashids::decode($id);
        $registro = Servicios::find($record[0]);

        return view('Center.servicios.editar')
            ->with('registro', $registro);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombre' => array( 'required', 'string', 'min:5','unique:servicios,nombre,'. $id),
                'descripcion' => array( 'required', 'string', 'min:10'),
                'imagen' => array( 'image','image_size:>=300,>=300')
            );
            $this->validate( $request,$rules );

            $registro = Servicios::find($id);
            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            if($imagen = BRequest::file('imagen')){
                $extension = $imagen->getClientOriginalExtension();
                $nombre_imagen = preg_replace('/\s*/', '', \Input::get('nombre'));
                $nombre_imagen = strtolower($nombre_imagen);
                Storage::disk('image')->put($nombre_imagen.'.'.$extension,  File::get($imagen));
                $registro ->imagen = $nombre_imagen.'.'.$extension;
            }
            $registro ->estado = \Input::get ('est');
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

        try{

            $registro = Servicios::find($id);
            $registro ->delete();

        } catch (\Exception $e) {

            return \Redirect::route('adminServicios')
                ->with('alerta','Parece que hay registros vinculados con este servicio...');

        }

        return \Redirect::route('adminServicios')
            ->with('alerta','El servicio ha sido eliminado con exito!');

    }
    public function Detalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Servicios')
            ->where('Servicios.id','=',$record[0])
            ->select('Servicios.id', 'Servicios.nombre', 'Servicios.imagen',  'Servicios.descripcion','Servicios.estado')
            ->first();

        return view('Center.servicios.detalles')
            ->with('registro', $registro);

    }
    public function servicios(){

        $servicios = Servicios::all();

        $view =  \View::make('Center.reportes.servicios', compact('servicios'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('servicios');
    }
}
