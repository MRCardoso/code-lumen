<?php
namespace CodeAgenda\Entities;


use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phone";

    protected $fillable = ["person_id", "description", "country_code", "number"];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function getMaskNumberAttribute()
    {
        return join('', [
            $this->country_code,
            " (",
            substr($this->number,0,2),
            ") ",
            substr($this->number,2),
        ]);
    }
}