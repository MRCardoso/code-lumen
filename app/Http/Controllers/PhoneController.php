<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Phone;

class PhoneController extends Controller
{
    public function destroy($id)
    {
        Phone::destroy($id);

        return redirect()->back();
    }
}