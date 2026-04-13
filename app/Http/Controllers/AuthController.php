<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        //Recaba informacion del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);
        
        //Registra la informacion en la base de datos 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
            //uso de has para manejo de checkbox

        ]);

        //Inicia sesion de forma automatica
        Auth::login($user);

        return redirect()->route('ingredientes.index');

    }

    public function loginForm(){
        return view('auth.login');
    }

    //Metodo para iniciar sesion
    public function login(Request $request){

        //Validar los valores del formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Realizar intento de inicio de sesion
        if(Auth::attempt($data)){
            
            $request -> session() -> regenerate();
            //Redireccionar al usuario con su sesion iniciada
            return redirect()->route('ingredientes.index');

        }

        //Si los datos son incorrectos mandar un error
        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ]);

    }

    //Metodo para cerrar sesion e invalidad las credenciales
    public function logout(Request $request){
        //Realizar intento de cerrar sesion
        Auth::logout();

        //Cierre de credenciales en las sesiones
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/acceso');

    }

    //Dashboard principal del administrador
    public function adminDashboard(){
        $usuarios = User::all();
        return view("admin.dashboard", compact('usuarios'));
    }

    public function destroyUsuario(User $usuario)
    {
        if (Auth::id() === $usuario->id) {
            return redirect()->route('admin-dashboard')->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete();
        return redirect()->route('admin-dashboard')->with('success', 'Usuario eliminado correctamente del sistema.');
    }

    public function editUsuario(User $usuario)
    {
        return view('admin.edit', compact('usuario'));
    }

    public function updateUsuario(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id, // Ignora el email del usuario actual en la regla unique
            'phone' => 'required',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'), // Si el checkbox está marcado, es admin
        ]);

        return redirect()->route('admin-dashboard')->with('success', 'Datos del usuario actualizados.');
    }
}
