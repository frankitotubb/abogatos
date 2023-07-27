<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Seguimiento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilController extends Controller
{
    public function updateestilo(Request $request)
    {
        try {
            $estilo = $request->input('estilo');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->estilo = $estilo;

            $courier->save();
            $request->session()->put('sidebar', $estilo);
            $request->session()->put('background', $estilo);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok estilo', 200);
    }

    public function updatemodo(Request $request)
    {
        try {
            $modo = $request->input('modo');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->modo = $modo;

            $courier->save();
            $request->session()->put('modo', $modo);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok modo', 200);
    }

    public function updatefuente(Request $request)
    {
        try {
            $fuente = $request->input('fuente');
            $id = Auth::user()->id;
            $courier = User::findOrFail($id);
            $courier->fuente = $fuente;

            $courier->save();
            $request->session()->put('fuente', $fuente);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        return response('ok fuente', 200);
    }

    public function compareHora() {
        $tiempo = Carbon::now();
        echo $tiempo->toTimeString();
    }

    public function buscar(Request $request)
    {
        $buscar = strtolower($request->input('buscar'));
        $posts = Caso::query()
            ->where('involucrados', 'iLIKE', "%{$buscar}%")
            ->orWhere('autoridad', 'iLIKE', "%{$buscar}%")
            ->orWhere('detalle', 'iLIKE', "%{$buscar}%")
            ->get();
        $posts2 = Seguimiento::query()
            ->where('descripcion', 'iLIKE', "LOWER(%{$buscar}%")
            ->orWhere('responsable', 'iLIKE', "%{$buscar}%")
            ->get();

        return view('buscar.index', compact('posts', 'posts2', 'buscar'));
    }

    public function stats() {

    }
    
    public function unauthorized()
    {
        $mensaje = "Usuario no autorizado.";
        return view('buscar.unauthorized', compact('mensaje'));
    }
}
