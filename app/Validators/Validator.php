<?php
namespace CodeAgenda\Validators;

use Illuminate\Support\Facades\Validator as Validate;

class Validator
{
    protected $rules;

    public function setRule($name, $value)
    {
        $this->rules[$name] = $value;
    }
    /**
     * check the rules for persists data in table
     *
     * @param array $post
     * @return mixed
     */
    public function  validateData(Array $post)
    {
        return Validate::make($post, $this->rules);
    }
}