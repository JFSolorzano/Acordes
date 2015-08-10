<?php

namespace RocketCandy\Services\Validation;

class posts extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'titulo' => array( 'required', 'string', 'min:10','unique:posts,titulo' ),
        'contenido' => array( 'required', 'string', 'min:1000')
    );

}   //end of class


//EOF