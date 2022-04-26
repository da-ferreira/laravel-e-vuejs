<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        return view('site.principal');  # Acessando a view 'principal.blade.php'
    }
}
