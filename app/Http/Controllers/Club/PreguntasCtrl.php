<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;

use Acordes\Preguntas;
use Illuminate\Http\Request;

class PreguntasCtrl extends Controller {

    function inicio(Request $request)
    {

        $preguntas = Preguntas::all();

//        dd($datos);

        return view('Club.acercaDe.preguntas')
            ->with('preguntas',$preguntas);

    }

}
