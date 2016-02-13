<?php
namespace CodeAgenda\Entities;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = ["name", "nickname", "sex" ];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}