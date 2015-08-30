<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\Servicios;
use Illuminate\Http\Request;
use Acordes\Solicitudes;
use Acordes\Serviciossolicitados;
use Auth;

class ServiciosCtrl extends Controller {

	public function inicio(){

        $servicios = Servicios::all(['nombre','descripcion', 'imagen', 'estado']);

        return view('Club.servicios.completo')
            ->with('servicios',$servicios);

    }

    public function  solicitud(){

        $servicios = Servicios::all(['id','nombre','descripcion', 'imagen']);

        return view('Club.servicios.solicitar')->with(['servicios' => $servicios]);

    }

    public function solicitar(Request $request){

        $inputs = \Input::all();
//        dd($request->all());
        try {

//            $this->_validador->validate($inputs);


            $registro = new Solicitudes;

            $fecha = date_create_from_format('j.m.Y h:i a',$request->get('fecha'));
            $fecha = $fecha->format('Y-m-j H:i:s');

            $registro->cliente = Auth::user()->id;
            $registro->especificaciones = $request->get('mensaje');
            $registro->fechayhora = $fecha;
            $registro->estado = 0;
            $registro->save();

            foreach($request->get('servicios') as $servicio => $sid){
                $ser = new Serviciossolicitados;
                $ser->solicitud = $registro->id;
                $ser->servicio = $sid;
                $ser->save();
            }

            dd('yeh');
            return \Redirect::route('publicCuenta')
                ->with('alerta', 'Tu reservacion!');

        } catch (ValidationException $e) {

            return \Redirect::route('publicReservacion')
                ->withInput()
                ->withErrors($e->get_errors());

        }

    }

}
