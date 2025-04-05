<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index', [
            'title' => 'Dashboard',
            'heading' => 'Welcome To Dashboard',
            'countProd' => \App\Models\Products::count(),
            'countCat' => \App\Models\Categories::count(),
            'countContact' => \App\Models\Contacts::count(),
        ]);
    }
}
