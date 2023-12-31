<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->where('disabled', 0)->orderBy('id', 'asc')->get();
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        $user->rol = $request->rol;
        $user->timestamps = false;
        if ($user->save()) {
            Session::put('success', 'Usuario modificado correctamente.');
        } else {
            Session::put('danger', 'Error al modificar un usuario.');
        }
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->disabled = 1;
        if ($user->save()) {
            Session::put('success', 'Usuario eliminado correctamente.');
        } else {
            Session::put('danger', 'Error al eliminar el usuario.');
        }
        return redirect()->route('usuarios.index');
    }
}
