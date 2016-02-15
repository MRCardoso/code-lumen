<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NotebookController extends Controller
{
    public function index($letter = 'A')
    {
        $persons = Person::where('nickname', 'ilike', "{$letter}%")->orderBy('id', 'DESC')->get();

        return view('notebook.index', compact('persons'));
    }

    public function search(Request $request)
    {
        if( ( $search = $request->search ) != '')
        {
            $like = Config::get('database.default') == 'pgsql' ? 'ilike':'like';
            // 'Ilike' only on postgresql, the mysql does not have 'ilike' method
            $persons = Person::where('name', $like, "%{$search}%")
                ->orWhere('nickname', $like, "%{$search}%")
                ->get();
            return view('notebook.index', compact('persons'));
        }
        return redirect()->route('notebook.index');
    }
}