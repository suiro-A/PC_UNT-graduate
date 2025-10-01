<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Request as StudentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_students' => User::where('role', 'student')->count(),
            'total_proposals' => Proposal::count(),
            'pending_proposals' => Proposal::where('status', 'pending')->count(),
            'total_requests' => StudentRequest::count(),
            'pending_requests' => StudentRequest::where('status', 'pending')->count(),
        ];

        $recentProposals = Proposal::with('user')->latest()->take(5)->get();
        $recentRequests = StudentRequest::with('user')->latest()->take(5)->get();

        return view('gestor.dashboard', compact('stats', 'recentProposals', 'recentRequests'));
    }

    public function proposals()
    {
        $proposals = Proposal::with('user')->latest()->get();
        return view('gestor.proposals.index', compact('proposals'));
    }

    public function showProposal(Proposal $proposal)
    {
        $proposal->load('user', 'reviewer');
        return view('gestor.proposals.show', compact('proposal'));
    }

    public function updateProposal(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected,in_review',
            'comments' => 'nullable|string',
        ]);

        $proposal->update([
            'status' => $validated['status'],
            'comments' => $validated['comments'],
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);

        return back()->with('success', 'Propuesta actualizada correctamente');
    }

    public function requests()
    {
        $requests = StudentRequest::with('user')->latest()->get();
        return view('gestor.requests.index', compact('requests'));
    }

    public function showRequest(StudentRequest $request)
    {
        $request->load('user', 'responder');
        return view('gestor.requests.show', compact('request'));
    }

    public function updateRequest(Request $request, StudentRequest $studentRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed,rejected',
            'response' => 'nullable|string',
        ]);

        $studentRequest->update([
            'status' => $validated['status'],
            'response' => $validated['response'],
            'responded_at' => now(),
            'responded_by' => auth()->id(),
        ]);

        return back()->with('success', 'Solicitud actualizada correctamente');
    }

    public function students()
    {
        $students = User::where('role', 'student')
            ->withCount(['proposals', 'requests'])
            ->latest()
            ->get();
        
        return view('gestor.students.index', compact('students'));
    }

    public function showStudent(User $student)
    {
        $student->load(['proposals', 'requests']);
        return view('gestor.students.show', compact('student'));
    }
}
