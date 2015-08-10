<?php

namespace RocketCandy\Services\Validation;

class menu extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombre' => array( 'required', 'string', 'min:10','unique:menu_opciones,nombre' ),
        'contenidoExtra' => array( 'required', 'string', 'min:5'),
        'descripcionCompleta' => array( 'required', 'string', 'min:50'),
        'costo' => array( 'required', 'numeric', 'min:1','max:1000'),
        //'imagen' => array('required','image','image_size:>=600,>=300')

    );

}   //end of class


//EOF