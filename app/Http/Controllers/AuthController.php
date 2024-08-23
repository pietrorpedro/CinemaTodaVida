<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function signIn()
    {
        return view('auth.signIn');
    }

    public function signUp()
    {
        return view('auth.signUp');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|same:confirmPassword',
            'confirmPassword' => 'required|string|min:8',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está registrado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.same' => 'A senha e a confirmação de senha devem ser iguais.',
            'confirmPassword.required' => 'A confirmação de senha é obrigatória.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validate();

        $user = User::create([
            'full_name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'password'=> bcrypt($validatedData['password']),
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/')->with('success', 'Login realizado com sucesso!');
        }

        // return redirect()->route('home')->with('success', 'Conta criada com sucesso!');
        
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
        ]);
    
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/')->with('success', 'Login realizado com sucesso!');
        }
    
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success');
    }
}
