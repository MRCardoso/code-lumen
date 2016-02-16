<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Person;
use CodeAgenda\Entities\Email;
use CodeAgenda\Services\EmailService;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * instance of the service to generate CreateUpdateDelete email
     * @var EmailService
     */
    private $service;

    /**
     * load the service layer, responsible by business rule
     *
     * @param EmailService $service
     */
    public function __construct(EmailService $service)
    {
        $this->service = $service;
    }
    /**
     * render interface to create new email
     *
     * @param $person_id
     * @return \Illuminate\View\View
     */
    public function create($person_id)
    {
        $person = Person::find($person_id);

        if( count($person) != 1)
            return  view('errors.404');

        return view('email.save',compact('person'));
    }

    /**
     * render interface to edit a exists email
     *
     * @param $id
     * @param $person_id
     * @return \Illuminate\View\View
     */
    public function edit($person_id, $id)
    {
        $email = Email::where(['person_id' => $person_id, 'id' => $id])->first();

        if( count($email) != 1)
            return  view('errors.404');
        
        return view('email.save', compact('email'));
    }

    public function store(Request $request, $person_id)
    {
        return $this->service->create($request->all(), $person_id);
    }

    public function update(Request $request, $person_id, $id)
    {
        return $this->service->update($request->all(), $person_id, $id);
    }

    public function destroy($person_id, $id)
    {
        return $this->service->destroy($person_id, $id);
    }
}