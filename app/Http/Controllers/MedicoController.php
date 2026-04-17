<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of medicos.
     */
    public function index()
    {
        return view('medicos.index');
    }
}
