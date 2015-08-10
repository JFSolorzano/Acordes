<?php

namespace RocketCandy\Services\Validation;

class sucursales extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'usuario' => array( 'required', 'string', 'min:5','unique:users,name' ),
        'contrasena' => array( 'required', 'string', 'min:6', 'same:confirmacion' ),
        'email' => array( 'required', 'string', 'min:7','unique:users,email' ),
    );

}   //end of class


//EOF