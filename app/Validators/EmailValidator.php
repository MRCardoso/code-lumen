<?php namespace CodeAgenda\Validators;

class EmailValidator extends Validator
{
    protected $rules = [
        'person_id' => 'required',
        'email' => 'required|email',
        'type' => 'required',
        'status' => 'required',
    ];

}