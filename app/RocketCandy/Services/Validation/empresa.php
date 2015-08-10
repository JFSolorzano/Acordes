<?php

namespace RocketCandy\Services\Validation;

class empresa extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'dato' => array( 'required', 'string', 'min:3','unique:empresa_datos,variable' ),
        'contenido' => array( 'required', 'string', 'min:3')
    );

}   //end of class


//EOF