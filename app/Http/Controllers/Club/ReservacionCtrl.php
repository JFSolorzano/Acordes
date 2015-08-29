<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Controllers\Controller;
use Acordes\Http\Requests;
use Acordes\Reservaciones;
use Auth;
use Illuminate\Database\Eloquent\Collection;
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
            ->where('menus.tipo', '=', 0)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        $bebidas = \DB::table('Opciones')
            ->join('menus', 'Opciones.menu', '=', 'menus.id')
            ->where('menus.tipo', '=', 1)
            ->select('Opciones.id', 'Opciones.nombre', 'Opciones.costo', 'Opciones.imagen')
            ->get();

        return view('Club.reservacion.paso1')->with(['platos' => $platos, 'bebidas' => $bebidas]);

    }

    public function pasodos()
    {

        $comidas = json_decode(\Request::get('json_comidas'));
        $bebidas = json_decode(\Request::get('json_bebidas'));

        $horas = [
            '4:00',
            '4:30',
            '5:00',
            '5:30',
            '6:00',
            '6:30',
            '7:00',
            '7:30',
            '8:00',
            '8:30',
            '9:00',
            '9:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
        ];

        return view('Club.reservacion.paso2')->with(['comidas' => $comidas, 'bebidas' => $bebidas]);

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
