<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::get();

        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function new()
    {
        return view('usuarios.form');
    }

    public function add(Request $request)
    {

        $usuario = new Usuario;
        $usuario = $usuario->create($request->all());
        return redirect('/usuarios');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.form', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return redirect('/usuarios');
    }

    public function delete( $id ){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
