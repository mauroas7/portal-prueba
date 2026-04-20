<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent va a la BD y trae todos los registros
        $pacientes = \App\Models\Paciente::all(); 
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('pacientes.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    // 2. Esta función recibe los datos y los guarda
    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni'      => 'required|string|max:20|unique:pacientes,dni',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'paciente',
        ]);

        Paciente::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
        ]);

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
