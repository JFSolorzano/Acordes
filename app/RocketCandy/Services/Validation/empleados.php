<?php

namespace RocketCandy\Services\Validation;

class empleados extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombres' => array( 'required', 'string', 'min:10' ),
        'apellidos' => array( 'required', 'string', 'min:10' ),
        'cargo' => array( 'required', 'string', 'min:1'),
        'biografia' => array( 'required', 'string', 'min:500'),
        'foto' => array('required','image','image_size:>=600,>=300')
    );

}   //end of class


//EOF