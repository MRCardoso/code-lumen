<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Person;
use CodeAgenda\Services\PersonService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * instance of the service to generate CreateUpdateDelete person
     *
     * @var PersonService
     */
    private $service;

    /**
     * load the service layer, responsible by business rule
     *
     * @param PersonService $service
     */
    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }
    /**
     * render interface to create new person
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('person.save');
    }
    /**
     * render interface to edit a exists person
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $person = Person::find($id);

        return view('person.save', compact('person'));
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}