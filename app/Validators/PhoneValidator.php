<?php namespace CodeAgenda\Validators;

class PhoneValidator extends Validator
{
    protected $rules = [
        'description' => 'required',
        'country_code' => 'required',
        'person_id' => 'required',
        'number' => 'required'
    ];

}