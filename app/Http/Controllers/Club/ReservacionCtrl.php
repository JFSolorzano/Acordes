<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Servicios;
use Acordes\Reservaciones;
use Acordes\Opciones;

use Illuminate\Http\Request;
use RocketCandy\Services\Validation\reservaciones as validador;

use Auth;

class ReservacionCtrl extends Controller {

    protected $_validador;

    public function __construct(validador $validador){

        $this->middleware('auth');//Verificacion de la autenticidad de la sesion
        $this->_validador = $validador;//asignacion de la clase a la variable protegida
    }

    function inicio(){

        $servicios = Servicios::lists('nombre','id');

        $platos = Opciones::all();
        $bebidas = Opciones::all();

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

        return view('Club.reservacion.crear')->with([
            'servicios'=>$servicios,
            'horas'=>$horas,
            'platos'=>$platos,
            'bebidas'=>$bebidas,
        ]);

    }

    public function insertar(){

        $inputs = \Input::all();

        try {

            $this->_validador->validate( $inputs );

            $registro = new Reservaciones;

            $registro ->cliente = Auth::user()->id;
            $registro ->servicio = \Input::get('servicio');
            $registro ->mensaje = \Input::get('detalles');
            $registro ->telefono = \Input::get('telefono');
            $registro ->save();

            return \Redirect::route('publicInicio')
                ->with('alerta','La pregunta ha sido agregada con exito!');

        } catch ( ValidationException $e ) {

            return \Redirect::route( 'publicReservacion' )
                ->withInput()
                ->withErrors( $e->get_errors() );

        }

    }

}
