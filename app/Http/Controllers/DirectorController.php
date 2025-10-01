<?php

namespace App\Http\Controllers;

use App\Models\Request as GraduateRequest;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalRequests' => GraduateRequest::count(),
            'pending' => GraduateRequest::where('status', 'pending')->count(),
            'approved' => GraduateRequest::where('status', 'approved')->count(),
            'rejected' => GraduateRequest::where('status', 'rejected')->count(),
            'avgReviewTime' => 4.2, // This would be calculated from actual data
            'approvalRate' => 75.7, // This would be calculated from actual data
        ];

        $monthlyData = [
            ['month' => 'Ago', 'solicitudes' => 3, 'aprobadas' => 2, 'rechazadas' => 1],
            ['month' => 'Sep', 'solicitudes' => 5, 'aprobadas' => 4, 'rechazadas' => 1],
            ['month' => 'Oct', 'solicitudes' => 8, 'aprobadas' => 6, 'rechazadas' => 2],
            ['month' => 'Nov', 'solicitudes' => 12, 'aprobadas' => 9, 'rechazadas' => 3],
            ['month' => 'Dic', 'solicitudes' => 10, 'aprobadas' => 7, 'rechazadas' => 3],
            ['month' => 'Ene', 'solicitudes' => 7, 'aprobadas' => 5, 'rechazadas' => 2],
        ];

        $reviewTimeData = [
            ['range' => '0-3 días', 'cantidad' => 12],
            ['range' => '4-7 días', 'cantidad' => 18],
            ['range' => '8-14 días', 'cantidad' => 10],
            ['range' => '15+ días', 'cantidad' => 5],
        ];

        return view('director.dashboard', compact('stats', 'monthlyData', 'reviewTimeData'));
    }

    public function reports()
    {
        return view('director.reports.index');
    }

    public function profile()
    {
        return view('director.profile');
    }
}
