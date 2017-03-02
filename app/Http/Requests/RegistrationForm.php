<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // validate the form
            'name' => 'required',
            'email'=> 'required|email',
            'password'=>'required|confirmed'
        ];
    }

    public function persist()
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);


        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));
    }
}
