<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Promociones;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\promociones as validador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Request as BRequest;

class PromocionesCtrl extends Controller {

    protected $_validador;

    public function __construct(validador $validador){

        $this->middleware('auth');
        $this->_validador = $validador;
    }

    public function inicio(Request $request){

        if (!\Entrust::can('crud-promociones')) {

            return \Redirect::to('/');

        } else {

            $registros = Promociones::buscar($request->get('parametros'))
                ->orderBy('nombre','desc')
                ->paginate(6);

            return view('Center.promociones.ver')
                ->with('registros',$registros);

        }

    }

    public function crear(){

        return view('Center.promociones.crear');//el punto equivale a usar pleca
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Promociones;

            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            $foto = BRequest::file('imagen');
            $extension = $foto->getClientOriginalExtension();
            Storage::disk('image')->put($foto->getFilename().'.'.$extension,  File::get($foto));
            $registro ->imagen = $foto->getFilename().'.'.$extension;
            $registro ->inicio = \Input::get('inicio');
            $registro ->fin = \Input::get('fin');
            $registro ->save();

            return \Redirect::route('adminPromociones')
                ->with('alerta','La promocion ha sido agregada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminPromocionesCrear' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function editar($id){

        $registro = Promociones::find($id);

        return view('Center.promociones.editar')
            ->with('registro', $registro);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombre' => array( 'required', 'string', 'min:5','unique:promociones,nombre'. $id),
                'descripcion' => array( 'required', 'string', 'min:30'),
                'imagen' => array(  'image', 'image_size:>=300,>=300'),
                'inicio' => array('date'),
                'fin' => array('date','after: inicio')
            );
            $this->validate( $request,$rules );

            $registro = Promociones::find($id);
            $registro ->nombre = \Input::get('nombre');
            $registro ->descripcion = \Input::get('descripcion');
            if($archivo = BRequest::file('foto')) {
                $foto = BRequest::file('imagen');
                $extension = $foto->getClientOriginalExtension();
                Storage::disk('image')->put($foto->getFilename().'.'.$extension,  File::get($foto));
                $registro ->imagen = $foto->getFilename().'.'.$extension;
            }
            if($inicio = \Input::get('inicio')){
            $registro ->inicio = \Input::get('inicio');}
            if($inicio = \Input::get('fin')) {
            $registro ->fin = \Input::get('fin');}
            $registro ->save();

            return \Redirect::route('adminPromociones')
                ->with('alerta','La promocion ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'PromocionesCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Promociones::find($id);
        $registro ->delete();

        return \Redirect::route('adminPromociones')
            ->with('alerta','La promocion ha sido eliminada con exito!');

    }

    public function promociones(){

        $promociones = Promociones::all()->toArray();

        $promociones= $promociones[0];

       //dd($promociones);

        $view =  \View::make('Center.reportes.promociones', compact('promociones'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('promociones');
    }
}
