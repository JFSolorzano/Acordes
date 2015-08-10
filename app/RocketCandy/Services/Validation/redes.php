<?php

namespace RocketCandy\Services\Validation;

class redes extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'nombre' => array( 'required', 'string', 'min:3','unique:redes,nombre' ),
        'link' => array( 'required', 'url', 'min:3','unique:redes,link')
    );

}   //end of class


//EOF