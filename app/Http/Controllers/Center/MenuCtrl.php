<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Menus;

use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\menu as validador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Request as BRequest;

class MenuCtrl extends Controller {

    protected $_validador;

    public function __construct(validador $validador){

        $this->middleware('auth');
        $this->_validador = $validador;
    }

    public function inicio(Request $request){

        if (!\Entrust::can('crud-menu')) {

            return \Redirect::to('/');

        } else {
            $registros = Opciones::buscar($request->get('parametros'))
            ->paginate(6);
            $menus= Menus::all(['id','nombre']);
            return view('Center.menu.ver')
                ->with('registros',$registros)
                ->with('menus', $menus);

        }

    }

    public function nuevaOpcion(){
        $menus= Menus::all(['id','nombre']);
        return view('Center.menu.crear')->with('menus', $menus);
    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Opciones;

            $registro ->nombre = \Input::get('nombre');
            $registro ->extra = \Input::get('extra');
            $registro ->descripcion = \Input::get('descripcion');
            $foto = BRequest::file('imagen');
            $extension = $foto->getClientOriginalExtension();
            Storage::disk('image')->put($foto->getFilename().'.'.$extension,  File::get($foto));
            $registro ->imagen = $foto->getFilename().'.'.$extension;
            $registro ->costo = \Input::get('costo');
            $registro ->menu = \Input::get('menu');
            $registro ->save();

            return \Redirect::route('adminMenu')
                ->with('alerta','La opción ha sido agregada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'adminMenusNuevo' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function editar($id){

        $registro = Opciones::find($id);
        $menus= Menus::all(['id','nombre']);
        return view('Center.menu.editar')
            ->with('registro', $registro)->with('menus', $menus);

    }

    public function actualizar($id, Request $request){

        try {

            $rules = array(
                'nombre' => array( 'required', 'string', 'min:10','unique:opciones,nombre,'.$id ),
                'extra' => array(  'string', 'min:5'),
                'descripcion' => array( 'required', 'string', 'min:20'),
                'costo' => array( 'required', 'numeric', 'min:1','max:1000'),
                'imagen' => array('image','image_size:>=300,>=300')

            );
            $this->validate( $request,$rules );

            $registro = Opciones::find($id);
            $registro ->nombre = \Input::get('nombre');
            $registro ->extra = \Input::get('extra');
            $registro ->descripcion = \Input::get('descripcion');
            if($archivo = BRequest::file('imagen')) {
                $foto = BRequest::file('imagen');
                $extension = $foto->getClientOriginalExtension();
                Storage::disk('image')->put($foto->getFilename().'.'.$extension,  File::get($foto));
                $registro ->imagen = $foto->getFilename().'.'.$extension;
            }
            $registro ->costo = \Input::get('costo');
            $registro ->menu = \Input::get('menu');
            $registro ->save();

            return \Redirect::route('adminMenu')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@editar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminar($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMEnu')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function botellas(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 6);

        }])->where('nombre','=','Botellas')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.menu', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');

    }

}
