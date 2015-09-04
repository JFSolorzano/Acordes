<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Carbon\Carbon ;
use Illuminate\Http\Request;
use Acordes\Reservaciones;

class ReservacionesCtrl extends Controller {

    public function __construct(){

        $this->middleware('auth');
    }

    public function  hoy(){

        $dt = Carbon::now();
        $d = $dt->toDateString();
        $reservaciones = \DB::table('reservaciones')
            ->join('users','users.id','=','reservaciones.cliente')
            ->whereRaw("DATE(reservaciones.inicio) = '".$d."'")
            ->select(\DB::raw('
                        reservaciones.id,
                        reservaciones.estado,
                        reservaciones.costoEstimado,
                        reservaciones.inicio,
                        reservaciones.duracion,
                        users.name,
                        users.id'))
            ->orderBy('reservaciones.inicio','desc')
            ->paginate(6);

        return view('Center.reservaciones.hoy')
            ->with('registros',$reservaciones);

    }

    public function hoyPost(Request $request){

        foreach($request->get('aprobadas') as $reservacion){

            $registro = Reservaciones::find($reservacion);
            $registro->estado = 1;
            $registro->save();

        }

        dd('yeh');



    }

    public function semana(){



    }

    public function mes(){



    }
}
