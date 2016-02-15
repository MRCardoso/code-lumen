<?php
namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Person;
use CodeAgenda\Entities\Phone;
use CodeAgenda\Services\PhoneService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhoneController extends Controller
{
    /**
     * instance of the service to generate CreateUpdateDelete phone
     * @var PhoneService
     */
    private $service;

    /**
     * load the service layer, responsible by business rule
     *
     * @param PhoneService $service
     */
    public function __construct(PhoneService $service)
    {
        $this->service = $service;
    }
    /**
     * render interface to create new phone
     *
     * @param $person_id
     * @return \Illuminate\View\View
     */
    public function create($person_id)
    {
        $person = Person::find($person_id);

        if( count($person) != 1)
            return  view('errors.404');

        return view('phone.save',compact('person'));
    }

    /**
     * render interface to edit a exists phone
     *
     * @param $id
     * @param $person_id
     * @return \Illuminate\View\View
     */
    public function edit($id,$person_id)
    {
        $phone = Phone::where(['person_id' => $person_id, 'id' => $id])->first();

        if( count($phone) != 1)
            return  view('errors.404');
        
        return view('phone.save', compact('phone'));
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