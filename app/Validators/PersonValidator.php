<?php namespace CodeAgenda\Validators;

class PersonValidator extends Validator
{
    protected $rules = [
        'name' => 'required|min:3|max:255|unique:person',
        'nickname' => 'required|max:50',
        'sex' => 'required'
    ];
}