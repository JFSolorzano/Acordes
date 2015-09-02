<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Controllers\Controller;
use Acordes\Http\Requests;
use Acordes\Opiniones;
use Illuminate\Http\Request;

class OpinionesCtrl extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');//Verificacion de la autenticidad de la sesion
    }

    public function inicio()
    {

        $registros = \DB::table('opiniones')
            ->join('users', 'opiniones.cliente', '=', 'users.id')
            ->select('users.id AS cliente', 'users.name AS nombre', 'opiniones.id AS opinion',
                'opiniones.mensaje AS mensaje', 'opiniones.estado')
            ->orderBy('opiniones.created_at', 'desc')
            ->paginate(6);


        return view('Center.opiniones.ver')
            ->with('registros', $registros);

    }

    public function guardar(Request $request)
    {


        \DB::table('opiniones')->update(array('estado' => 0));

        if ($request->get('estado')) {

            foreach ($request->get('estado') as $opinion) {

                $registro = Opiniones::find($opinion);
                $registro->estado = 1;
                $registro->save();
            }
        }

        $registros = \DB::table('opiniones')
            ->join('users', 'opiniones.cliente', '=', 'users.id')
            ->select('users.id AS cliente', 'users.name AS nombre', 'opiniones.id AS opinion',
                'opiniones.mensaje AS mensaje', 'opiniones.estado')
            ->orderBy('opiniones.created_at', 'desc')
            ->paginate(6);

        return view('Center.opiniones.ver')
            ->with('registros', $registros);

    }

}
