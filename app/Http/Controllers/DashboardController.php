<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Request as StudentRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $stats = [
            'proposals' => $user->proposals()->count(),
            'pending_proposals' => $user->proposals()->where('status', 'pending')->count(),
            'approved_proposals' => $user->proposals()->where('status', 'approved')->count(),
            'requests' => $user->requests()->count(),
            'pending_requests' => $user->requests()->where('status', 'pending')->count(),
        ];

        $recentProposals = $user->proposals()->latest()->take(3)->get();
        $recentRequests = $user->requests()->latest()->take(3)->get();

        return view('dashboard.index', compact('stats', 'recentProposals', 'recentRequests'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string',
            'program' => 'required|string',
        ]);

        $user->update($validated);

        return back()->with('success', 'Perfil actualizado correctamente');
    }
}
