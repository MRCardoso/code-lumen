<?php
/*
 | ---------------------------------------------------------------------------------------------------------------------
 | service layer to manage operation on the module email
 | ---------------------------------------------------------------------------------------------------------------------
 */
namespace CodeAgenda\Services;

use CodeAgenda\Entities\Email;
use CodeAgenda\Validators\EmailValidator;

class EmailService
{
    /**
     * validator layer
     * @var EmailValidator
     */
    private $validator;
    /**
     * Eloquent Model
     * @var Email
     */
    private $model;

    /**
     * Has dependency injection of the Email and EmailValidator
     *
     * @param EmailValidator $validator
     * @param Email $email
     */
    public function __construct(EmailValidator $validator, Email $email)
    {
        $this->validator = $validator;
        $this->model = $email;
    }
    /**
     * Persists in the database a new email for a person after validate your data
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
            return redirect()->route('email.create', ['person_id'=>$person_id])->withErrors($validator)->withInput();

        $email = $this->model->create($data);
        $letter = strtoupper(substr($email->person->nickname,0,1));

        session(['success' => "o email [{$email->email}] foi criado com sucesso!"]);

        return redirect()->route('notebook.letter', compact('letter'));
    }

    /**
     * update information of the email for a person after validate your data
     *
     * @param array $data
     * @param $person_id
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Array $data, $person_id, $id)
    {
        $email = $this->model->where(['person_id' => $person_id, 'id' => $id])->first();

        if( count($email) != 1) return view('errors.404');

        $data['person_id'] = $email->person->id;
        $validator = $this->validator->validateData($data);

        if( $validator->fails() )
            return redirect()->route('email.edit', ['id' => $id,'person_id'=>$person_id ])->withErrors($validator)->withInput();

        $email->fill($data)->save();
        $letter = strtoupper(substr($email->person->nickname,0,1));

        session(['success' => "o email [{$email->email}] foi atualizado com sucesso!"]);

        return redirect()->route('notebook.letter', compact('letter'));
    }

    /**
     * remove from database a email of a person
     *
     * @param $person_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($person_id, $id)
    {
        $email = $this->model->where(['person_id' => $person_id,'id' => $id])->first();

        if( count($email) != 1) return view('errors.404');

        if( $email->delete() )
            session(['success' => "o email [{$email->email}] foi removido com sucesso!"]);
        else
            session(['error' => "o email [{$email->email}] não foi removido!"]);

        return redirect()->back();
    }
}