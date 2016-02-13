<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Person;

class PersonController extends Controller
{
    public function destroy($id)
    {
        Person::destroy($id);

        return redirect()->back();
    }
}