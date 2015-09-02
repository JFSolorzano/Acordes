<?php

namespace RocketCandy\Services\Validation;

class empleados extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombres' => array( 'required', 'string', 'min:3' ),
        'email' => array( 'required', 'email')
    );

}   //end of class


//EOF