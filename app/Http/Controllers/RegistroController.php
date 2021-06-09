<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create() 
    {
        return view('registro.create');
    }

    public function store(Request $request)
    {
        //$data = $request->except('_token');
        $hashSenha = bcrypt($request->password);

        $credencials = [
            'name' => $request->name,
            'password' => $hashSenha,
            'email' => $request->email
        ];

        $user = User::create($credencials);
    }
}
