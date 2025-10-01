<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalUsers' => User::count(),
            'graduates' => User::where('role', 'egresado')->count(),
            'managers' => User::where('role', 'gestor')->count(),
            'admins' => User::where('role', 'admin')->count(),
            'directors' => User::where('role', 'director')->count(),
            'activeCriteria' => 5, // This would come from a Criteria model
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        return view('admin.users.index');
    }

    public function criteria()
    {
        return view('admin.criteria.index');
    }

    public function graduates()
    {
        return view('admin.graduates.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
