<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = auth()->user()->proposals()->latest()->get();
        return view('dashboard.proposals.index', compact('proposals'));
    }

    public function create()
    {
        return view('dashboard.proposals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'advisor' => 'nullable|string|max:255',
        ]);

        auth()->user()->proposals()->create([
            ...$validated,
            'status' => 'pending',
            'submitted_at' => now(),
        ]);

        return redirect()->route('proposals.index')->with('success', 'Propuesta enviada correctamente');
    }

    public function show(Proposal $proposal)
    {
        $this->authorize('view', $proposal);
        return view('dashboard.proposals.show', compact('proposal'));
    }
}
