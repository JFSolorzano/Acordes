<?php namespace Acordes\Http\Controllers\Center;

use Acordes\Datos;
use Acordes\Http\Controllers\Controller;
use Acordes\Http\Requests;
use Illuminate\Http\Request;
use RocketCandy\Exceptions\ValidationException;
use RocketCandy\Services\Validation\empresa as validador;
use Vinkla\Hashids\Facades\Hashids;

class EmpresaCtrl extends Controller
{

    /**
     * Variable protegida que hara referencia a la clase de validacion
     * -> RocketCandy\Services\Validation\servicios
     */
    protected $_validador;

    /**
     * Constructor de la nueva instancia del controlador
     */
    public function __construct(validador $validador)
    {

        $this->middleware('auth');//Verificacion de la autenticidad de la sesion
        $this->_validador = $validador;//asignacion de la clase a la variable protegida

    }

    /**
     * Funcion que retorna la vista de inicio del modulo de informacion empresarial, esta retorna la vista con los datos
     * @param Request $request - variable interna que controla los elementos de la vista para obtner su valor
     * @return $this
     */
    public function inicio(Request $request)
    {

        if (!\Entrust::can('crud-datos')) {
            return \Redirect::to('/');

        } else {

            $registros = Datos::buscar($request->get('parametros'))
                ->orderBy('nombre', 'desc')
                ->paginate(6);

            return view('Center.empresa.ver')->with('registros', $registros);
        }
    }

    /**
     * Funcion que cargara la vista de edicion de registro
     * @param $id
     * @return $this
     */
    public function editar($id)
    {

        $record = Hashids::decode($id);
        $registro = Datos::find($record[0]);


        return view('Center.empresa.editar')->with('registro', $registro);

    }

    /**
     * Funcion que hace el proceso de reingreso de captura y guardado de datos,
     * una vez finalizado redirije a la vista del inicio, enviando un mensaje de alerta
     * @param $id
     */
    public function actualizar($id, Request $request)
    {
        try {

            $rules = array(
                'nombre' => array('required', 'string', 'min:3', 'unique:datos,nombre,' . $id),
                'contenido' => array('required', 'string', 'min:3')
            );
            $this->validate($request, $rules);

            $registro = Datos::find($id);
            $registro->nombre = \Input::get('nombre');
            $registro->contenido = \Input::get('contenido');
            $registro->save();


            return \Redirect::route('adminEmpresa')->with('alerta', 'El dato ha sido modificado con exito!');

        } catch (ValidationException $e) {

            return \Redirect::action('EmpresaCtrl@editar', array('id' => $id))
                ->withInput()
                ->withErrors($e->get_errors());

        }
    }
    public function informacion_empresarial(){

        $empresarial = Datos::all();

        //dd($promociones);

        $view =  \View::make('Center.reportes.info_empresarial', compact('empresarial'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('empresarial');
    }
}
