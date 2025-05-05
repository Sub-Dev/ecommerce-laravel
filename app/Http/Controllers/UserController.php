<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    // Método para exibir o formulário de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Método para registrar novo usuário
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autentica o usuário após o registro
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para autenticar o usuário
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redireciona para o dashboard
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    // Método para fazer logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Método para exibir o painel do usuário
    public function dashboard()
    {
        return view('dashboard');
    }

    // Método para exibir o perfil do usuário
    public function showProfile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    // Método para editar o perfil do usuário
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('profile')->with('success', 'Perfil atualizado com sucesso');
    }

    // Método para redefinir senha
    public function showResetForm()
    {
        return view('auth.passwords.email');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Senha redefinida com sucesso!');
        }

        return back()->withErrors(['email' => 'Erro ao redefinir a senha']);
    }
}

