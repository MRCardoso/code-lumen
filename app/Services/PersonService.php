<?php
/*
 | ---------------------------------------------------------------------------------------------------------------------
 | service layer to manage operation on the module person
 | ---------------------------------------------------------------------------------------------------------------------
 */
namespace CodeAgenda\Services;

use CodeAgenda\Entities\Person;
use CodeAgenda\Validators\PersonValidator;

class PersonService
{
    /**
     * validator layer
     * @var PersonValidator
     */
    private $validator;
    /**
     * Eloquent model
     * @var
     */
    private $model;

    /**
     * Has Dependency injection of the Person and PersonValidator
     *
     * @param PersonValidator $validator
     * @param Person $person
     */
    public function __construct(PersonValidator $validator, Person $person)
    {
        $this->validator = $validator;
        $this->model = $person;
    }

    /**
     * Persists in the database a new record for person after validate your data
     *
     * @param $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create($data)
    {
        $validator = $this->validator->validateData($data);

        if( $validator->fails() )
            return redirect()->route('person.create')->withErrors($validator)->withInput();

        $person = $this->model->create($data);
        $letter = strtoupper(substr($person->nickname,0,1));

        return redirect()->route('notebook.letter', compact('letter'));
    }
    /**
     * update information of a person after validate your data
     *
     * @param array $data
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Array $data, $id)
    {
        $person = $this->model->find($id);

        if( count($person) != 1) return view('errors.404');

        $this->validator->setRule('name', 'required|min:3|max:255|unique:person,name,'.$id);
        $validator = $this->validator->validateData($data);

        if( $validator->fails() )
            return redirect()->route('person.edit', ['id'=>$id])->withErrors($validator)->withInput();

        $person->fill($data)->save();
        $letter = strtoupper(substr($person->nickname,0,1));

        return redirect()->route('notebook.letter', compact('letter'));
    }
    /**
     * remove from database a person informed
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $person = $this->model->find($id);

        if( count($person) != 1) return view('errors.404');

        $person->delete();

        return redirect()->back();
    }
}