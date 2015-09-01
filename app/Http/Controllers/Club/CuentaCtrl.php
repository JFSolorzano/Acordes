<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Auth;
use Acordes\Opiniones;
use Illuminate\Http\Request;

class CuentaCtrl extends Controller {

	public function dashboard(){

        $reservaciones = \DB::table('reservaciones')
            ->select('id','inicio','duracion','costoEstimado','estado')
            ->where('cliente','=', Auth::user()->id)
            ->get();

        $solicitudes = \DB::table('solicitudes')
            ->select('id','estado','especificaciones','fechayhora')
            ->where('cliente','=', Auth::user()->id)
            ->get();

        $opinion = Opiniones::where('cliente','=',\Auth::user()->id)->first();

        if($opinion){ $opinion = 1; } else { $opinion = 0; }

        return view('Club.cuenta.dashboard')->with(['reservaciones'=>$reservaciones, 'solicitudes'=>$solicitudes,'opinion'=>$opinion]);

    }

    public function opinion(){

        $opinion = Opiniones::where('cliente','=',\Auth::user()->id)->first();
        if($opinion){

            return \Redirect::route('publicCuenta')
                ->with('alerta','Usted ya nos ha brindado su opinion, gracias!');

        }else {
            return view('Club.opinion.formulario');
        }



    }

    public function opinionPost(Request $request){

        $opinion = new Opiniones;

        $opinion->cliente = Auth::user()->id;
        $opinion->mensaje = $request->get('mensaje');
        $opinion->estado = 0;
        $opinion->save();

        return \Redirect::route('publicCuenta')
            ->with('alerta','Gracias por tu opinion!');


    }

}
