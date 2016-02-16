<?php namespace CodeAgenda\Entities;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';
    protected $fillable = [ 'person_id', 'email', 'type', 'status' ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}