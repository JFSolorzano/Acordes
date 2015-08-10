<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Http\Requests;
use Acordes\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdministracionCtrl extends Controller {

	function inicio()
    {
        return view('Center.inicio');
    }

}
