<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
        $form->persist();

        session()->flash('message', 'thanks so much for signing up!');

        return redirect()->home();
    }
}
