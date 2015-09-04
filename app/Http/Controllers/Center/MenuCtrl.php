<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Menus;
use Acordes\Opciones;
use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\menu as validador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Request as BRequest;
use Vinkla\Hashids\Facades\Hashids;

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

    //-----------------------------------------------------------------------MENU ESPECIFICO - BOTELLAS

    public function inicioBotellas(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',6)->paginate(6);

            return view('Center.menu.botellas.ver')->with('registros',$registros);
        }
    }

    public function botellasEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.botellas.editar')
            ->with('registro', $registro);

    }

    public function eliminarBotellas($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuBotellas')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function botellasDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.botellas.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - SIN ALCOHOL
    public function inicioSinAlcohol(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',1)->paginate(6);

            return view('Center.menu.sin-alcohol.ver')->with('registros',$registros);
        }
    }

    public function SinAlcoholEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.sin-alcohol.editar')
            ->with('registro', $registro);

    }

    public function eliminarSinAlcohol($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuSinAlcohol')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function SinAlcoholDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.sin-alcohol.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - CERVEZAS
    public function inicioCervezas(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',2)->paginate(6);

            return view('Center.menu.cervezas.ver')->with('registros',$registros);
        }
    }

    public function CervezasEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.cervezas.editar')
            ->with('registro', $registro);

    }

    public function actualizarCervezas($id, Request $request){

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

            return \Redirect::route('adminMenuCervezas')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@CervezasEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarCervezas($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuCervezas')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function CervezasDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.cervezas.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - CON ALCOHOL
    public function inicioConAlcohol(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',3)->paginate(6);

            return view('Center.menu.con-alcohol.ver')->with('registros',$registros);
        }
    }

    public function ConAlcoholEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.con-alcohol.editar')
            ->with('registro', $registro);

    }

    public function eliminarConAlcohol($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuConAlcohol')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function ConAlcoholDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.con-alcohol.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - BEBIDAS CALIENTES
    public function inicioCalientes(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',4)->paginate(6);

            return view('Center.menu.bebidas-calientes.ver')->with('registros',$registros);
        }
    }

    public function CalientesEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.bebidas-calientes.editar')
            ->with('registro', $registro);

    }

    public function actualizarCalientes($id, Request $request){

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

            return \Redirect::route('adminMenuCalientes')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@CalientesEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarCalientes($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuCalientes')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function CalientesDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.bebidas-calientes.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - BEBIDAS CALIENTES
    public function inicioEspeciales(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',5)->paginate(6);

            return view('Center.menu.bebidas-especiales.ver')->with('registros',$registros);
        }
    }

    public function EspecialesEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.bebidas-especiales.editar')
            ->with('registro', $registro);

    }

    public function actualizarEspeciales($id, Request $request){

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

            return \Redirect::route('adminMenuCalientes')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@CalientesEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarEspeciales($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuEspeciales')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function EspecialesDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.bebidas-especiales.detalles')
            ->with('registro', $registro);

    }


    //--------------------------------------------------------------------------MENU ESPECIFICO - PARA PICAR
    public function inicioParaPicar(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',7)->paginate(6);

            return view('Center.menu.para-picar.ver')->with('registros',$registros);
        }
    }

    public function ParaPicarEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.para-picar.editar')
            ->with('registro', $registro);

    }

    public function actualizarParaPicar($id, Request $request){

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

            return \Redirect::route('adminMenuParaPicar')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@ParaPicarEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarParaPicar($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuParaPicar')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function ParaPicarDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.para-picar.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - PLATOS FUERTES
    public function inicioPlatosFuertes(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',8)->paginate(6);

            return view('Center.menu.platos-fuertes.ver')->with('registros',$registros);
        }
    }

    public function PlatosFuertesEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.platos-fuertes.editar')
            ->with('registro', $registro);

    }

    public function actualizarPlatosFuertes($id, Request $request){

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

            return \Redirect::route('adminMenuPlatosFuertes')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@PlatosFuertesEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarPlatosFuertes($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuPlatosFuertes')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function PlatosFuertesDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.platos-fuertes.detalles')
            ->with('registro', $registro);

    }

    //--------------------------------------------------------------------------MENU ESPECIFICO - BOCAS
    public function inicioBocas(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',9)->paginate(6);

            return view('Center.menu.bocas.ver')->with('registros',$registros);
        }
    }

    public function BocasEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.bocas.editar')
            ->with('registro', $registro);

    }

    public function actualizarBocas($id, Request $request){

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

            return \Redirect::route('adminMenuBocas')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@BocasEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarBocas($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuBocas')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function BocasDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.bocas.detalles')
            ->with('registro', $registro);

    }


//--------------------------------------------------------------------------MENU ESPECIFICO - PANINIS
    public function inicioPaninis(Request $request){

        if(!\Entrust::can('crud-menu')){

            return \Redirect::to('/');

        } else {

            $registros = Opciones::buscar($request->get('parametros'))->where('menu','=',10)->paginate(6);

            return view('Center.menu.paninis.ver')->with('registros',$registros);
        }
    }

    public function PaninisEditar($id){

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

        return view('Center.menu.paninis.editar')
            ->with('registro', $registro);

    }

    public function actualizarPaninis($id, Request $request){

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

            return \Redirect::route('adminMenuPaninis')
                ->with('alerta','La opción ha sido modificada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::action( 'MenuCtrl@PaninisEditar',array('id'=>$id) )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

    public function eliminarPaninis($id){

        $registro = Opciones::find($id);
        $registro ->delete();

        return \Redirect::route('adminMenuPaninis')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function PaninisDetalles($id){

        $record = Hashids::decode($id);

        $registro = \DB::table('Opciones')
            ->join('menus','menus.id','=','Opciones.menu')
            ->where('Opciones.id','=',$record[0])
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.imagen', 'Opciones.extra', 'Opciones.descripcion','Opciones.costo', 'menus.nombre AS menu')
            ->first();

        return view('Center.menu.paninis.detalles')
            ->with('registro', $registro);

    }

    //GENRALES
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

        $record = Hashids::decode($id);

        $registro = Opciones::find($record[0]);

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

        return \Redirect::route('adminMenu')
            ->with('alerta','La opcion ha sido eliminada con exito!');

    }

    public function botellas(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 6);

        }])->where('nombre','=','Botellas')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.botellas', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');

    }
    public function bebidas_sin_alc(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 1);

        }])->where('nombre','=','Bebidas Sin Alcohol')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.sinalcohol', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');

    }
    public function cervezas(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 2);

        }])->where('nombre','=','Cervezas')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.cervezas', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');

    }
    public function bebidas_con_alc(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 3);

        }])->where('nombre','=','Bebidas Con Alcohol')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.conalcohol', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function bebidas_calientes(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 4);

        }])->where('nombre','=','Bebidas Calientes')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.calientes', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function bebidas_especiales(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 5);

        }])->where('nombre','=','Bebidas Especiales')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.especiales', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function picar(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 7);

        }])->where('nombre','=','Para Picar')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.picar', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function platos_fuertes(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 8);

        }])->where('nombre','=','Platos Fuertes')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.fuertes', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function bocas(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 9);

        }])->where('nombre','=','Bocas')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.bocas', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function paninis(){

        $menu = Menus::With(['opciones' => function($query)
        {
            $query->where('menu', '=', 10);

        }])->where('nombre','=','Paninis')->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.paninis', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function comidas(){

        $menu = Menus::With(['menus' => function($query)
        {
            $query->where('tipo', '=', 1);
        }])->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.comidas', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }
    public function bebidas(){

        $menu = Menus::With(['menus' => function($query)
        {
            $query->where('tipo', '=', 0);
        }])->get();

        $menu = $menu[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.bebidas', compact('menu'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('menu');
    }

}
