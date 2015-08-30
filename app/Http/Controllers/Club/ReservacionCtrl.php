<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Controllers\Controller;
use Acordes\Http\Requests;
use Acordes\Reservaciones;
use Acordes\Opcionesreservadas;
use Auth;
use Illuminate\Http\Request;
use RocketCandy\Services\Validation\reservaciones as validador;

class ReservacionCtrl extends Controller
{

    protected $_validador;

    public function __construct(validador $validador)
    {

        $this->middleware('auth');//Verificacion de la autenticidad de la sesion
        $this->_validador = $validador;//asignacion de la clase a la variable protegida
    }

    function inicio()
    {

        $platos = \DB::table('Opciones')
            ->join('menus', 'Opciones.menu', '=', 'menus.id')
            ->where('menus.tipo', '=', 0)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        $bebidas = \DB::table('Opciones')
            ->join('menus', 'Opciones.menu', '=', 'menus.id')
            ->where('menus.tipo', '=', 1)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        return view('Club.reservacion.crear')->with(['platos' => $platos, 'bebidas' => $bebidas]);;

    }

    public function pasouno()
    {

        $platos = \DB::table('Opciones')
            ->join('menus', 'Opciones.menu', '=', 'menus.id')
            ->where('menus.tipo', '=', 1)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        $bebidas = \DB::table('Opciones')
            ->join('menus', 'Opciones.menu', '=', 'menus.id')
            ->where('menus.tipo', '=', 0)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        return view('Club.reservacion.paso1')->with(['platos' => $platos, 'bebidas' => $bebidas]);

    }

    public function pasodos()
    {

        $comidas = json_decode(\Request::get('json_comidas'));
        $bebidas = json_decode(\Request::get('json_bebidas'));

        $personas = \Request::get('personas');

        $duraciones = [
            '30 min',
            '1 hora',
            '2 horas',
            '3 horas',
            '4 horas',
            '5 horas'
        ];

        return view('Club.reservacion.paso2')->with(['comidas' => $comidas, 'bebidas' => $bebidas, 'personas' => $personas, 'duraciones' => $duraciones]);

    }

    function pasoDosPost(Request $request){

        $inputs = \Input::all();
        try {

//            $this->_validador->validate($inputs);

            $duracion = \Input::get('duracion');

            switch($duracion){
                case 0: $durara = '00:30:00'; break;
                case 1: $durara = '01:00:00'; break;
                case 2: $durara = '02:00:00'; break;
                case 3: $durara = '03:00:00'; break;
                case 4: $durara = '04:00:00'; break;
                case 5: $durara = '05:00:00'; break;
                default: $durara = '00:00:00';
            }

            $registro = new Reservaciones;

//            dd($request->all());

            $registro->cliente = Auth::user()->id;
            $registro->personas = $request->get('personas');
            $registro->mensaje = $request->get('mensaje');
            $registro->precocinado = $request->get('precocinado');
            $registro->inicio = $request->get('fecha');
            $registro->duracion = $durara;
            $registro->save();


            $combinacion = array_combine($request->get('opciones'),$request->get('cantidades'));
            foreach($combinacion as $op => $cantidad){
                $or = new Opcionesreservadas;
                $or->reservacion = $registro->id;
                $or->opcion = $op;
                $or->cantidad = $cantidad;
                $or->save();
            }

            dd('Exito!');
            return \Redirect::route('publicInicio')
                ->with('alerta', 'La pregunta ha sido agregada con exito!');

        } catch (ValidationException $e) {

            return \Redirect::route('publicReservacion')
                ->withInput()
                ->withErrors($e->get_errors());

        }

    }

    public function insertar()
    {

        $inputs = \Input::all();

        dd($inputs);

        try {

            $this->_validador->validate($inputs);

            $registro = new Reservaciones;

            $registro->cliente = Auth::user()->id;
            $registro->servicio = \Input::get('servicio');
            $registro->mensaje = \Input::get('detalles');
            $registro->telefono = \Input::get('telefono');
            $registro->save();

            return \Redirect::route('publicInicio')
                ->with('alerta', 'La pregunta ha sido agregada con exito!');

        } catch (ValidationException $e) {

            return \Redirect::route('publicReservacion')
                ->withInput()
                ->withErrors($e->get_errors());

        }

    }

}
