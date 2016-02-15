<?php
/*
 | ---------------------------------------------------------------------------------------------------------------------
 | service layer to manage operation on the module phone
 | ---------------------------------------------------------------------------------------------------------------------
 */
namespace CodeAgenda\Services;

use CodeAgenda\Entities\Phone;
use CodeAgenda\Validators\PhoneValidator;

class PhoneService
{
    /**
     * validator layer
     * @var PhoneValidator
     */
    private $validator;
    /**
     * Eloquent Model
     * @var Phone
     */
    private $model;

    /**
     * Has dependency injection of the Phone and PhoneValidator
     *
     * @param PhoneValidator $validator
     * @param Phone $phone
     */
    public function __construct(PhoneValidator $validator, Phone $phone)
    {
        $this->validator = $validator;
        $this->model = $phone;
    }
    /**
     * Persists in the database a new phone for a person after validate your data
     *
     * @param Array $data
     * @param $person_id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(Array $data, $person_id)
    {
        $data['person_id'] = $person_id;
        $validator = $this->validator->validateData($data);

        if( $validator->fails() )
            return redirect()->route('phone.create', ['person_id'=>$person_id])->withErrors($validator)->withInput();

        $phone = $this->model->create($data);
        $letter = strtoupper(substr($phone->person->nickname,0,1));

        return redirect()->route('notebook.letter', compact('letter'));
    }

    /**
     * update information of the phone for a person after validate your data
     *
     * @param array $data
     * @param $person_id
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Array $data, $person_id, $id)
    {
        $phone = $this->model->where(['person_id' => $person_id, 'id' => $id])->first();

        if( count($phone) != 1) return view('errors.404');

        $data['person_id'] = $phone->person->id;
        $validator = $this->validator->validateData($data);

        if( $validator->fails() )
            return redirect()->route('phone.edit')->withErrors($validator)->withInput();

        $phone->fill($data)->save();
        $letter = strtoupper(substr($phone->person->nickname,0,1));

        return redirect()->route('notebook.letter', compact('letter'));
    }

    /**
     * remove from database a phone of a person
     *
     * @param $person_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($person_id, $id)
    {
        $phone = $this->model->where(['person_id' => $person_id,'id' => $id])->first();

        if( count($phone) != 1) return view('errors.404');

        $phone->delete();

        return redirect()->back();
    }
}