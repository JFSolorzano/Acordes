<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CuentaCtrl extends Controller {

	public function dashboard(){

        $reservaciones = \DB::table('reservaciones')
            ->select('id','inicio','duracion','costoEstimado','estado')
            ->where('cliente','=', \Auth::user()->id)
            ->get();

        $solicitudes = \DB::table('solicitudes')
            ->select('id','estado','especificaciones','fechayhora')
            ->where('cliente','=', \Auth::user()->id)
            ->get();

        return view('Club.cuenta.dashboard')->with(['reservaciones'=>$reservaciones, 'solicitudes'=>$solicitudes]);

    }

}
