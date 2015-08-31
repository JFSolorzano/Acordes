<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;
use Acordes\User;
use Illuminate\Http\Request;
use Request as BRequest;

class UsuariosCtrl extends Controller {

    public function usuarios_backend(){

        $usuarios = User::With(['usuarios' => function($query)
        {
            $query->where('type', '=', 0);
        }])->get();

        $usuarios = $usuarios[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.usuarios_backend', compact('usuarios'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('usuarios');
    }

    public function usuarios_clientes(){

        $usuarios = User::With(['usuarios' => function($query)
        {
            $query->where('type', '=', 1);
        }])->get();

        $usuarios = $usuarios[0];

//        dd($menu);

        $view =  \View::make('Center.reportes.usuarios_clientes', compact('usuarios'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('usuarios');
    }
}
