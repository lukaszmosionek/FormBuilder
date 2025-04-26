<?php

namespace App\Http\Controllers;

use App\Http\Requests\FromSubmitRequest;
use Illuminate\Http\Request;
use App\Services\FormBuilder;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function show()
    {
        $formBuilder = new FormBuilder(route('form.submit'));

        $form = $formBuilder
            ->addField('text', 'name', 'Imię', true, 'form-control')
            ->addField('email', 'email', 'Email', true, 'form-control')
            ->addField('textarea', 'description', 'Opis', false, 'form-control')
            ->render();

        return view('form', ['form' => $form]);
    }

    public function submit(FromSubmitRequest $request)
    {
        // Tu można zapisać dane do bazy, wysłać maila itp.

        return redirect()->back()->with('success', 'Formularz został wysłany poprawnie!');
    }
}
