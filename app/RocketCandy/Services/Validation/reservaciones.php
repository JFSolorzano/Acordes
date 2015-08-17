<?php

namespace RocketCandy\Services\Validation;

class reservaciones extends Validation {

    /**
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(

        'servicio' => array( 'required'),
        'detalles' => array( 'required', 'string', 'min:10'),
        'fecha' => array('required','date','after: now')

    );

}   //end of class


//EOF