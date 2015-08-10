<?php

namespace RocketCandy\Services\Validation;

class preguntas extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'pregunta' => array( 'required', 'string', 'min:15','unique:preguntas,pregunta' ),
        'respuesta' => array( 'required', 'string', 'min:2')
    );

}   //end of class


//EOF