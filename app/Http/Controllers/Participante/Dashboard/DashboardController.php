<?php

namespace App\Http\Controllers\Participante\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('participante.dashboard.index'); 
    }
}
