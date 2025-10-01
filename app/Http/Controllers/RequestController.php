<?php

namespace App\Http\Controllers;

use App\Models\Request as StudentRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = auth()->user()->requests()->latest()->get();
        return view('dashboard.requests.index', compact('requests'));
    }

    public function create()
    {
        return view('dashboard.requests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:document,meeting,extension,other',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        auth()->user()->requests()->create($validated);

        return redirect()->route('requests.index')->with('success', 'Solicitud creada correctamente');
    }

    public function show(StudentRequest $request)
    {
        $this->authorize('view', $request);
        return view('dashboard.requests.show', compact('request'));
    }
}
