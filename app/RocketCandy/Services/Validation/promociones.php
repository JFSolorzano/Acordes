<?php

namespace RocketCandy\Services\Validation;

class promociones extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombre' => array( 'required', 'string', 'min:5','unique:promociones,nombre' ),
        'descripcion' => array( 'required', 'string', 'min:30'),
        'imagen' => array( 'required', 'image', 'image_size:>=300,>=600'),
        'inicio' => array('required','date'),
        'fin' => array('required','date','after: inicio')

    );

}   //end of class


//EOF