<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {

        return view('auth.user');

    }

    public function store(UserRequest $request)
    {

        if($user = User::where('email', '=', $request->email)->first())
        {

            if(Hash::check($request->senha, $user->password))
            {

                Auth::login($user);

                return to_route('dashborad')->with(['message' => 'Senha bem vindo '.$user->name]);

            }

            return back()->with(['message' => 'Usuário não encontrado']);

        }

        return back()->with(['message' => 'Usuário não encontrado']);

    }

}
