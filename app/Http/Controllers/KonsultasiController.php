<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $doctors = User::has('doctor')->get();
        return view('konsultasi', ['doctors' => $doctors]);
    }
}
