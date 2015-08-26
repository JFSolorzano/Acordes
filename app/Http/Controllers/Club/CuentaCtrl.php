<?php namespace Acordes\Http\Controllers\Club;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CuentaCtrl extends Controller {

	public function dashboard(){

        return view('Club.cuenta.dashboard');

    }

}
