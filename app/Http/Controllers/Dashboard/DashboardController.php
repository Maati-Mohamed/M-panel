<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Config;
use App\Notifications\AddNewAdmin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    
        return view('dashboard.index');
    }
}
