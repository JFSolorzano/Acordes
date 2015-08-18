<?php

namespace RocketCandy\Services\Validation;

class empleados extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombres' => array( 'required', 'string', 'min:10' ),
        'apellidos' => array( 'required', 'string', 'min:10' ),
        'biografia' => array( 'required', 'string', 'min:50'),
        'foto' => array('required','image','image_size:>=300,>=300')
    );

}   //end of class


//EOF