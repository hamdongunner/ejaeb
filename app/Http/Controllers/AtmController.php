<?php

namespace App\Http\Controllers;

use App\Atm;
use Illuminate\Http\Request;

class AtmController extends Controller
{
    public function index()
    {
        $atms = Atm::all();
        return View('home',compact('atms'));
    }
}





