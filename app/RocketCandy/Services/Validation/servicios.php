<?php

namespace RocketCandy\Services\Validation;

class servicios extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombre' => array( 'required', 'string', 'min:3','unique:servicios,nombre' ),
        'descripcion' => array( 'required', 'string', 'min:15')
    );

}   //end of class


//EOF